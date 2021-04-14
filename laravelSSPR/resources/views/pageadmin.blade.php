
@extends('layouts.layout')

@section('title', 'Admin-каталог')


@section('content')
  <main id="content">
    <div class="container">
      <h1> Admin-Каталог</h1>

      <div class="add-car-button">
        <a class="btn btn-primary" href="{{ route('cars.create') }}" role="button">Добавить</a>
      </div>

      <div class="row">

        @foreach ($cars as $car)
          <div class="col-lg-3 col-md-6" id="car_{{ $car->PK_Car }}">
            <div class="card single-car-item h-100">
              <a href="{{ route('cars.read', $car->PK_Car) }}">

                  @if ($car->imagePath)
                    <img src="{{asset('/storage/' . $car->imagePath)}}" class="card-img-top" alt="No image">
                  @else
                    <img src="{{asset('/img/emptyimage.png') }}" class="card-img-top" alt="Отсутствует">
                  @endif

                  <div class="card-body">
                    <h5>{{$car->superstructure->superstructureName}}
                      на шасси
                      {{$car->baseAvto->avtoFirm->firmName}} - {{$car->baseAvto->modelName}}</h5>
                    <p>Цена: {{$car->price}} руб.</p>
                    <p>Надстройка: {{$car->superstructure->superstructureName}} </p>
                    <p>Год выпуска: {{$car->yearIssue}}</p>
                  </div>
                </a>
              <div class="card-footer mt-auto">
                <!-- Админские кнопки редактирования и удаления -->
                  <a class="btn btn-warning edit" href="{{ route('cars.edit', $car->PK_Car) }}" role="button">Изменить</a>

                <form method="POST" action="{{ route('cars.delete', $car->PK_Car) }}">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-warning edit" onclick="return confirm('Вы действительно хотите удалить запись?');">Удалить</button>
                </form>

              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </main>

@endsection