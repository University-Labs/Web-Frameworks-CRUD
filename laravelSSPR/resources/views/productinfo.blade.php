
@extends('layouts.layout')

@section('title', 'Информация о продукте')


@section('content')

  <main id="content">
    <div class="container">
      <h1>{{ $singleCar->superstructure->superstructureName }} на шасси {{$singleCar->baseAvto->avtoFirm->firmName }} - {{ $singleCar->baseAvto->modelName }}</h1>
      <div class="feature">
        <h5>Категория: {{ $singleCar->avtoCategory->nameCategory }}</h5>
        <div class="col">
          <div class="col-lg-4">
            @if ($singleCar->imagePath)
              <img src="{{asset('/storage/' . $singleCar->imagePath)}}" class="card-img-top" alt="No image">
            @else
              <img src="img/emptyimage.png" class="card-img-top" alt="Отсутствует">
            @endif
          </div>
        </div>

        <a class="btn btn-info" href="buycar_{{$singleCar->PK_Car}}" role="button">Заказать</a>
        за 1 клик

        @if(session('message'))
          <div class="alert alert-success" role="alert">
              {{ session('message') }}
          </div>
        @endif

        <div class="model-info">
          <h5> Описание: </h5>
          <p class="firm">Производитель: {{ $singleCar->baseAvto->avtoFirm->firmName }}</p>
          <p class="model">Модель: {{ $singleCar->baseAvto->modelName }}</p>
          <p class="superstructure">Надстройка на авто: {{ $singleCar->superstructure->superstructureName }} </p>
          <p class="price">Цена: {{ $singleCar->price }} руб.</p>
          <p class="year">Год выпуска: {{ $singleCar->yearIssue }} </p>
          <p class="description">Описание: {{ $singleCar->description }}
          </p>
        </div>
      </div>
    </div>
  </main>


@endsection
