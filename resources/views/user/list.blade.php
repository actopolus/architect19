@extends('layout.web')

@section('title')Список пользователей@endsection

@section('content')
    <div class="row">
        <div class="col-12">
        @foreach ($users as $user)
            <p>
                <a href="{{ route('user.show', ['id' => $user->id]) }}">
                    {{ $user->firstname }} {{ $user->lastname }}
                </a>
            </p>
        @endforeach
        </div>
    </div>
@endsection
