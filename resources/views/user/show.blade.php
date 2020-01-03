@extends('layout.web')

@section('title'){{ $user->firstname . ' ' . $user->lastname }}@endsection

@section('content')
    <h3>
        {{ $user->firstname }} {{ $user->lastname }}
        <small class="text-muted">&#64;{{ $user->login }}</small>
    </h3>

    <dl class="row">
        <dt class="col-3">Город</dt>
        <dd class="col-9">{{ $user->city }}</dd>

        <dt class="col-3">Возраст</dt>
        <dd class="col-9">{{ $user->age }}</dd>

        <dt class="col-3">Пол</dt>
        <dd class="col-9">{{ config('enums.gender.' . $user->gender) }}</dd>

        <dt class="col-3">Интересы</dt>
        <dd class="col-9">{{ $user->interests }}</dd>
    </dl>
@endsection
