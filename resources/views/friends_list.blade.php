<div class="p-3 flex-fill" style="background-color: #E8F5Fd; border-radius: 0.9em">
    <h4 class="mb-2">Recommendation</h4>
    <ul style="list-style-type: none; padding-inline-start:0px;">
        @foreach(auth()->user()->not_follows()->get() as $user)
            <li>
                <div class="mb-2" style="font-size: 14px">
                    <a class="d-flex align-items-center" style="text-decoration: none; color: #000000"
                        href="{{ route('profile', $user->username) }}">
                        <img height="40" width="40" src="{{ $user->avatar }}" class="rounded-circle mr-2">
                        {{ $user->name }}
                    </a>
                </div>
            </li>
        @endforeach
        @if(auth()->user()->not_follows()->count() === 0)
            <p class="text-danger text-capitalize">Empty Recommendation.</p>
        @endif
    </ul>
</div>
