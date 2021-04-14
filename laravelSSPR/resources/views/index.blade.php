
@extends('layouts.layout')

@section('title', 'Главная')


@section('content')

  <main id="content">
    <div class="container">
      <h1>Главная</h1>
    </div>
    <div id="mainpagecontent">
      <div class="container">
        <div class="row">
          <div class="company-info col-lg-5">
            <p class="h1">Спец. техника</p>
            <p class="h1">на продажу</p>
          </div>

          <div class="company-info col-lg-7">
            <p class="h1">Низкие цены</p>
            <a href="{{route('catalog')}}"> <p class="h1">Просмотр техники</p> </a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-11">
            <img src="{{ asset('img/indeximage.png') }}" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection
