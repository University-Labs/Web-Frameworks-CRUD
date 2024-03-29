
@extends('layouts.layout')

@section('title', 'Каталог')



@section('content')

  <main id="content">
      <div class="container">
        <h1> Каталог</h1>

        @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <div class="row">

          @foreach ($cars as $car)
            <div class="col-lg-3 col-md-6">
              <div class="card single-car-item h-100">
                <a href="{{route('cars.read', $car->PK_Car) }}">

                  @if ($car->imagePath)
                    <img src="{{ asset('/storage/' . $car->imagePath) }}" class="card-img-top" alt="No image">
                  @else
                    <img src="{{ asset('/img/emptyimage.png') }}" class="card-img-top" alt="Отсутствует">
                  @endif

                  <div class="card-body">
                    <h5 class="carName">{{$car->superstructure->superstructureName}} на шасси {{$car->baseAvto->avtoFirm->firmName}} - {{$car->baseAvto->modelName}}</h5>
                    <p class="price">Цена: {{$car->price}} руб.</p>
                    <p class="superstructure">Надстройка: {{$car->superstructure->superstructureName}} </p>
                    <p class="year">Год выпуска: {{$car->yearIssue}}</p>
                  </div>
                </a>
                <div class="card-footer mt-auto">
                  <a class="btn-info btn-lg" href="{{ route('users.buy', $car->PK_Car) }}" role="button">Заказать</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

  </main>

@endsection
