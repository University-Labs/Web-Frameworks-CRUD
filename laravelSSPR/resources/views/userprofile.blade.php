@extends('layouts.layout')

@section('title', $user->username)


@section('content')

  <main id="content">
    <div class="container">
      <h1>Пользователь {{$user->username}} </h1>
      <div class="feature">
        <div class="col">
          <div class="col-lg-4">
            <p>E-mail: {{$user->email}}</p>
          </div>
        </div>
        <div class="model-info">
          @if (Auth::user()->id == $user->id)
          <p>
            Ваши заказы:
          </p>
            @if ($orders->count() == 0)
              Отсутствуют
            @else
              Присутствуют
            @endif
          @endif
        </div>
      </div>
    </div>
  </main>


@endsection
