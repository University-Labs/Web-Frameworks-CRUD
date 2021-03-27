
@extends('layouts.layout')

@section('title')
  @if ($curSuper->exists)
    Редактирование Надстройки
  @else
    Новая Надстройка
  @endif
@endsection

@section('content')

    <main id="content">
      <div class="container">
      @if ($curSuper->exists)
        <h1>Редактирование Надстройки</h1>
      @else
        <h1>Новая Надстройка</h1>
      @endif
        @if ($curSuper->exists)
          <form method="POST" action="{{ route('superstructures.update', $curSuper->PK_Superstructure) }}">
        @else
          <form method="POST" action="{{ route('superstructures.store') }}" id="formStore">
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
            <input required name="superstructureName" id="superstructureName" type="text" class="form-control" placeholder="Впишите наименование" value= "{{ old( 'superstructureName', $curSuper->superstructureName) }}">
          </div>


          <div class="btn-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.back()">Назад</button>
          </div>
        </form>

      </div>
    </main>

@endsection