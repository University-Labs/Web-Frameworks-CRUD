
@extends('layouts.layout')

@section('title')
  @if ($curCat->exists)
    Редактирование Категории
  @else
    Новая категория
  @endif
@endsection

@section('content')

    <main id="content">
      <div class="container">
      @if ($curCat->exists)
        <h1>Редактирование Категории</h1>
      @else
        <h1>Новая Категория</h1>
      @endif
        @if ($curCat->exists)
          <form method="POST" action="{{ route('categories.update', $curCat->PK_Category) }}">
          @method('PUT')
        @else
          <form method="POST" action="{{ route('categories.store') }}" id="formStore">
          @method('POST')
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
            <label for="price">Наименование</label>
            <input required name="nameCategory" id="nameCategory" type="text" class="form-control" placeholder="Впишите наименование" value= "{{ old( 'nameCategory', $curCat->nameCategory) }}">
          </div>


          <div class="btn-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.back()">Назад</button>
          </div>
        </form>

      </div>
    </main>

@endsection