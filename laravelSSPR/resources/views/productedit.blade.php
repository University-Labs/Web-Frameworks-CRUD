
@extends('layouts.layout')

@section('title')
  @if ($curCar->exists)
    Редактирование Автомобиля
  @else
    Новый Автомобиль
  @endif
@endsection



@section('content')

    <main id="content">
      <div class="container">
      @if ($curCar->exists)
        <h1>Редактирование Автомобиля</h1>
      @else
        <h1>Новый Автомобиль</h1>
      @endif
        @if ($curCar->exists)
          <form method="POST" action="{{ route('cars.update', $curCar->PK_Car) }}" enctype="multipart/form-data">
        @else
          <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data" id="formStore">
        @endif
        @csrf

          @if ($errors->any())
          <div class="row justify-content-center">
            <div class="col-md-11">
              <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
              </div>
            </div>
          </div>
          @endif

          <div class="form-group edit-fields">

            <label for="PK_BaseAvto">Модель базы</label>
            <select required name="PK_BaseAvto" id="PK_BaseAvto" type="text" class="form-control" placeholder="Укажите название модели">
              @foreach ($baseavtos as $baseavto)
              <option @if ($baseavto->PK_BaseAvto == $curCar->PK_BaseAvto) selected @endif
                        id = "BaseAvtoPK" name="BaseAvtoPK" value="{{ $baseavto->PK_BaseAvto }}">
                {{ $baseavto->avtoFirm->firmName }} - {{ $baseavto->modelName }}
              </option>
              @endforeach
            </select>

          </div>

          <div class="form-group edit-fields">

            <label for="PK_Superstructure">Надстройка</label>
            <select required name="PK_Superstructure" id="PK_Superstructure" type="text" class="form-control" placeholder="Выберите надстройку">
              @foreach ($superstructures as $superstructure)
              <option @if ($superstructure->PK_Superstructure == $curCar->PK_Superstructure) selected @endif
                        id = "SuperstructurePK" name="SuperstructurePK" value="{{ $superstructure->PK_Superstructure }}">
                {{ $superstructure->superstructureName }}
              </option>
              @endforeach
            </select>

          </div>

          <div class="form-group edit-fields">

            <label for="PK_Category">Категория</label>
            <select required name="PK_Category" id="PK_Category" type="text" class="form-control" placeholder="Выберите категорию">
              @foreach ($categories as $category)
              <option @if ( $category->PK_Category == $curCar->PK_Category ) selected @endif
                        id = "CategoryPK" name="CategoryPK" value=" {{ $category->PK_Category }} ">
                {{ $category->nameCategory }}
              </option>
              @endforeach
            </select>

          </div>

          <div class="form-group edit-fields">
            <label for="price">Цена</label>
            <input required name="price" id="price"type="number" class="form-control" placeholder="Укажите цену" value= "{{ old( 'price', $curCar->price) }}">
          </div>

          <div class="form-group edit-fields">
            <label for="yearissue">Год производства</label>
            <input required name="yearIssue" id="yearIssue" type="number" class="form-control" placeholder="Введите год" value= "{{ old('yearIssue', $curCar->yearIssue) }}">
          </div>

          <div class="form-group edit-fields">
            <label for="image">Фото</label>
            <input name = "image" type="file" id="image" class="chooseFile form-control-file" placeholder="Выберите фото" value= "{{ $curCar->imagePath }}">
          </div>

          <div class="form-group edit-fields">
            <label for="description">Описание</label>
            <textarea class="description form-control" name="description" id="description">{{ old('description', $curCar->description) }}</textarea></p>
          </div>


          <div class="btn-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.back()">Назад</button>
          </div>
        </form>

      </div>
    </main>

@endsection