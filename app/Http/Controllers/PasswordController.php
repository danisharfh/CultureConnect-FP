<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class PasswordController extends Controller
{

    public function edit(User $user)
    {
        return view('profiles.change-password', compact('user'));
    }
    
    public function change()
    {
        return view('password.change');
    }

    public function update(User $user)
    {
    $data_to_update = request()->validate([
        'oldpassword' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    $currentPassword = $data_to_update['oldpassword'];
    $newPassword = $data_to_update['password'];

    if (Hash::check($currentPassword, $user->password)) {
        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect()->route('home')->with('success', 'Password changed successfully.');
    } else {
        return redirect()->back()->withErrors(['oldpassword' => 'Incorrect old password.'])->withInput();
    }
    }
}
