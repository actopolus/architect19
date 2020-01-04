@extends('layout.web')

@section('title')Список пользователей@endsection

@section('content')
    @guest
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    <h1 class="display-4">Друзья</h1>
                    <p class="lead">Первая социальная сеть, где только общение и ничего больше.</p>
                    <hr class="my-4">
                    <p>Мы отказались от мемасов, каналов, групп и всего, что мешает человеческому общению.</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('user.signup') }}" role="button">Присоединиться</a>
                </div>
            </div>
        </div>
    @endguest

    <div class="row">
        <div class="col-12">
            <h3>Наши друзья</h3>
            <div class="list-group">
                @forelse ($users as $user)
                    <a
                        href="{{ route('user.show', ['id' => $user->id]) }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $user->firstname }} {{ $user->lastname }}
                        <span class="badge badge-primary badge-pill">{{ $user->age }}</span>
                    </a>
                @empty
                    <a
                        href="{{ route('user.signup') }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        Ты можешь стать первым другом
                        <span class="badge badge-primary badge-pill">1</span>
                    </a>
                @endforelse
            </div>
        </div>
    </div>
@endsection
