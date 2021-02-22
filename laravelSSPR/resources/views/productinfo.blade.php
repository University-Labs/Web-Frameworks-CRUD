
@extends('layouts.layout')

@section('title', 'Информация о продукте')


@section('content')

  <main id="content">
    <div class="container">
      <h1>Информация о модели: {{ $id }}
      на шасси
      {{ $id }}</h1>
      <div class="feature">
        <h5>Категория: {{$id}}</h5>
        <div class="col">
          <div class="col-lg-4">
            <img src="img/emptyimage.png" class="card-img-top" alt="Отсутствует">
          </div>
        </div>
        <div class="model-info">
          @foreach ($firms as $firm)
            {{$firm->firmName}}
          @endforeach
          <p>Производитель: Этот</p>
          <p>Модель: Эта</p>
          <p>Надстройка на авто: Та самая </p>
          <p>Цена: Отсутствует руб.</p>
          <p>Год выпуска: 0 </p>
          <p>Описание: -
          </p>
        </div>
      </div>
    </div>
  </main>


@endsection
