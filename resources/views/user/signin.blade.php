@extends('layout.web')

@section('title')Вход@endsection

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2>Вход</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.auth') }}">
                {{ csrf_field() }}
                @method('POST')

                <div class="form-group">
                    <label for="login">Логин:</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection
