
@extends('layouts.layout')

@section('title')
  @if ($curBase->exists)
    Редактирование Базы
  @else
    Новая База
  @endif
@endsection

@section('content')

    <main id="content">
      <div class="container">
      @if ($curBase->exists)
        <h1>Редактирование Базы</h1>
      @else
        <h1>Новая База</h1>
      @endif
        @if ($curBase->exists)
          <form method="POST" action="{{ route('bases.update', $curBase->PK_BaseAvto) }}">
          @method('PUT')
        @else
          <form method="POST" action="{{ route('bases.store') }}" id="formStore">
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
            <input required name="modelName" id="modelName" type="text" class="form-control" placeholder="Впишите наименование" value= "{{ old( 'modelName', $curBase->modelName) }}">
          </div>

          <div class="form-group edit-fields">
            <label for="PK_AvtoFirm">Фирма базы</label>
            <select required name="PK_AvtoFirm" id="PK_AvtoFirm" type="text" class="form-control" placeholder="Выберите фирму производитель">
              @foreach ($firms as $firm)
              <option @if ($firm->PK_AvtoFirm == $curBase->PK_AvtoFirm) selected @endif
                        id = "AvtoFirmPK" name="AvtoFirmPK" value="{{ $firm->PK_AvtoFirm }}">
                {{ $firm->firmName }}
              </option>
              @endforeach
            </select>
          </div>


          <div class="btn-group">
            <button type="submit" class="btn btn-success">Сохранить</button>
            <button type="button" class="btn btn-default" onclick="javascript:history.back()">Назад</button>
          </div>
        </form>

      </div>
    </main>

@endsection