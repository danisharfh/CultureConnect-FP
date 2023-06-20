<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom,#eaafc8, #654ea3, #2D0A31);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<script src="http://unpkg.com/turbolinks"></script>
<div id="app">
    <section class="pl-5 py-3 ">
        <header class="container mx-auto ">
            <img src="{{ asset('image\download-removebg-preview.png') }}" width="85" height="85" class="mr-4">
            <span class="pl-1 align-bottom align-self-center h4"
                style="color:#FFFFFF ; letter-spacing:2px;">CultureConnect</span>
            <div style="float: right">
                @auth
                    <span> <img height="40" width="40" class="rounded-circle" src="{{auth()->user()->avatar}}">
                    <span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline-flex">
    @csrf
    <button class="btn btn-link text-white" type="submit">Logout</button>
</form>

                        </form>
                        </span>
                    </span>
                @endauth
            </div>

        </header>
    </section>
    <section class="pl-5">
        <main class="container mx-auto">
            <div class="d-flex  mt-3">
                @auth()
                    <div class="">
                        @include('sidebar_links')
                    </div>
                @endauth

                <div class="flex-fill">
                @yield('content')
                <!-- Home.blade.php file-->
                </div>
                @auth()
                    <div class="justify-content-end">
                        @include('friends_list')
                    </div>
                @endauth

            </div>

        </main>
    </section>
</div>
</body>
</html>
