
@extends('layouts.layout')

@section('title', 'Каталог')



@section('content')

  <main id="content">
      <div class="container">
        <h1> Каталог</h1>
        <div class="row">


            <div class="col-lg-3 col-md-6">
              <div class="card single-car-item h-100">
                <a href="productinfo_11">
                    <img src="img/emptyimage.png" class="card-img-top" alt="Отсутствует">

                  <div class="card-body">
                    <h5>Машина
                      на шасси
                      Надстройки</h5>
                    <p>Цена: Дорого руб.</p>
                    <p>Надстройка: Нет </p>
                    <p>Год выпуска: 0</p>
                  </div>
                </a>
              </div>
            </div>


        </div>
      </div>
  </main>

@endsection
