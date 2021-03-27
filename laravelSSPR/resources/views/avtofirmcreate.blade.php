
@extends('layouts.layout')

@section('title')
  @if ($curFirm->exists)
    Редактирование Авто фирмы
  @else
    Новая Фирма авто
  @endif
@endsection

@section('content')

    <main id="content">
      <div class="container">
      @if ($curFirm->exists)
        <h1>Редактирование Авто фирмы</h1>
      @else
        <h1>Новая Фирма авто</h1>
      @endif
        @if ($curFirm->exists)
          <form method="POST" action="{{ route('avtofirms.update', $curFirm->PK_AvtoFirm) }}">
        @else
          <form method="POST" action="{{ route('avtofirms.store') }}" id="formStore">
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
            <input required name="firmName" id="firmName" type="text" class="form-control" placeholder="Впишите наименование" value= "{{ old( 'firmName', $curFirm->firmName) }}">
          </div>


          <div class="btn-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.back()">Назад</button>
          </div>
        </form>

      </div>
    </main>

@endsection