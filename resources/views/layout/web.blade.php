<html lang="ru">
    <head>
        <title>Friends - @yield('title', 'Первая социальная сеть без мемов и информационного шума')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">Friends</a></h5>
            @auth
                <nav class="my-2 my-md-0 mr-md-3">
                    <a href="{{ route('user.show', ['id' => Auth::user()->getAuthIdentifier()]) }}" class="btn btn-success">
                        {{ Auth::user()->firstname }}
                    </a>
                </nav>
                <a class="btn btn-outline-primary" href="{{ route('user.logout') }}">Выход</a>
            @endauth

            @guest
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="{{ route('user.signin') }}">Вход</a>
                </nav>
                <a class="btn btn-outline-primary" href="{{ route('user.signup') }}">Регистрация</a>
            @endguest
        </div>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
