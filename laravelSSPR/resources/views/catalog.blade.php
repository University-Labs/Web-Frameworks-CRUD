
@extends('layouts.layout')

@section('title', 'Каталог')



@section('content')

  <main id="content">
      <div class="container">
        <h1> Каталог</h1>
        <div class="row">


          @foreach ($cars as $car)
            <div class="col-lg-3 col-md-6">
              <div class="card single-car-item h-100">
                <a href="productinfo_{{$car->PK_Car}}">

                  @if ($car->imagePath)
                    <img src="{{$car->imagePath}}" class="card-img-top" alt="No image">
                  @else
                    <img src="img/emptyimage.png" class="card-img-top" alt="Отсутствует">
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
              </div>
            </div>
          @endforeach
        </div>
      </div>
  </main>

@endsection
