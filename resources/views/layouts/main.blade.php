<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
    <body class="bg-white-100">
        <nav class="border-b border-gray-300 w-4/5 md:w-auto">
            <div class="container mx-auto flex items-center justify-between px-4 py-6">
                <ul class="flex items-center">
                    <li>
                        <a href="{{ route('homepage') }}">
                            <img class="w-11" src="{{ asset('images/selar-no-bg-logo-small.png') }}" alt="">
                        </a>
                    </li>
                </ul>
                <ul class="flex items-center">
                    <li class="ml-6">
                        <a href="{{ route('login') }}" class="hover:text-gray-30 p-3">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-gray-30 btn-bg text-white p-3 rounded-full">Register</a>
                    </li>
                    <!-- <div class="relative">
                    </div> -->
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
</html>