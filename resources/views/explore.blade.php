@extends('layouts.app')

@section('content')
<div class="mt-2 mx-5 border" style="background: #FFFFFF; border-radius: 10px; border-color: Black; width: 800px;">
    <form action="{{ route('explore.search') }}" method="GET" class="mb-4 d-flex align-items-start">
        <div class="form-group mr-3" style="width: 80%; margin-top: 20px; margin-left: 50px;">
            <input type="text" name="q" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Search</button>
    </form>
        @isset($query)
    <h3 style="text-align: center;">Search Results for "{{ $query }}"</h3>
        @endisset

        <form method="post" action="{{ route('tweets') }}" enctype="multipart/form-data">
            @csrf
            <div>
                @error('tweetText')
                    <div class="alert alert-danger m-3">{{ $message }}</div>
                @enderror
                @error('tweetImage')
                    <div class="alert alert-danger m-3">{{ $message }}</div>
                @enderror
            </div>
        </form>

        @foreach ($tweets as $tweet)
            <div class="mt-2 mx-5 border" style="border-radius: 10px; border-color: Black;">
                <div class="d-flex m-3">
                    <div>
                        <a href="{{ route('profile', $tweet->user) }}">
                            <img height="40" width="40" src="{{ $tweet->user->avatar }}" class="rounded-circle mr-2"
                                style="flex-shrink: 0;" />
                        </a>
                    </div>
                    <div class="ml-1" style="width: 700px;">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a style="text-decoration: none; color: #000000"
                                    href="{{ route('profile', $tweet->user) }}">
                                    <h5 class="font-weight-bold">{{ !empty($tweet->user->name) ? $tweet->user->name : "not" }}</h5>
                                </a>
                                <p>{{ $tweet->body }}</p>
                            </div>
                        </div>

                        <div class="container">
                            @if($tweet->path_image)
                                <img src="{{ $tweet->path_Image($tweet->path_image) }}" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $tweets->links() }}
    </div>
@endsection
