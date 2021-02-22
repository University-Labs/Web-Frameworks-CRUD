
@extends('layouts.layout')

@section('title', 'Admin-каталог')


@section('content')
  <main id="content">
    <div class="container">
      <h1> Admin-Каталог</h1>

      <div class="add-car-button">
        <a class="btn btn-primary" href="createcar" role="button">Добавить</a>
      </div>

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
              <div class="card-footer mt-auto">
                <!-- Админские кнопки редактирования и удаления -->
                  <a class="btn btn-warning edit" href="updatecar_" role="button">Изменить</a>

                <form method="POST" action="delete_">
                  <button type="submit" class="btn btn-warning edit" onclick="return confirm('Вы действительно хотите удалить запись?');">Удалить</button>
                </form>
              </div>
            </div>
          </div>


      </div>

    </div>
  </main>

@endsection