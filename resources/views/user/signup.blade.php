@extends('layout.web')

@section('title')Регсистрация@endsection

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <h2>Регистрация</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.store') }}">
                {{ csrf_field() }}
                @method('POST')

                <div class="form-group">
                    <label for="login">Логин:</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">@</span></div>
                        <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="firstname">Имя:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                    </div>

                    <div class="form-group col-6">
                        <label for="lastname">Фамилия:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="age">Возраст:</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
                </div>

                <div class="form-group">
                    <label for="gender">Пол:</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="0" @if (old('gender') === 0) selected @endif>Мужской</option>
                        <option value="1" @if (old('gender') === 1) selected @endif>Женский</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="city">Город:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                </div>

                <div class="form-group">
                    <label for="interests">Интересы:</label>
                    <textarea type="text" class="form-control" id="interests" name="interests">{{ old('interests') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                </div>

                <div class="form-group">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Создать профиль</button>
                </div>
            </form>
        </div>
    </div>
@endsection
