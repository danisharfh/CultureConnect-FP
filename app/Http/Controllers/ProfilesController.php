<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;

class ProfilesController extends Controller
{
    public function show(User $user)
    {

        return view('profiles.show', [
            'user' => $user,
            'tweets'=>$user->tweets()->withLikes()->paginate(3),
        ]);
    }

    public function edit(User $user)
    {

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {

        $data_to_update=request()->validate([
            'username' => ['string', 'required', 'alpha_dash', 'max:15', Rule::unique('users')->ignore($user)],
            'name' => ['string', 'required', 'max:20'],
            'bio' => ['string', 'max:255'],
            'avatar' => ['file'],
            'email' => ['string', 'required', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        if(request('avatar'))
        {
            $data_to_update['avatar'] = request('avatar')->store('public\avatars');
        }

        if(request('banner'))
        {
            $data_to_update['banner'] = request('banner')->store('public\banner');
        }

        $user->update($data_to_update);
        return redirect(route('profile',$user));

    }

}
