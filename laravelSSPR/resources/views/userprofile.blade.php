@extends('layouts.layout')

@section('title', $user->username)


@section('content')

  <main id="content">
    <div class="container">
      <h1>Пользователь {{$user->username}} </h1>
      <div class="feature">
        <div class="col">
          <div class="col-lg-4">
            <p>E-mail: {{$user->email}}</p>
          </div>
        </div>
        <div class="model-info">
          @if (Auth::user()->id == $user->id)
          <p>
            Ваши заказы:
          </p>


          @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
          @endif

            <table class="table table-bordered mb-5">
              <thead>
                <tr class="table-info">
                  <th scope="col">Время заказа</th>
                  <th scope="col">Товар</th>
                  <th scope="col">  </th>
                </tr>
              </thead>
              <tbody>

              @if ($orders->count() == 0)
                Отсутствуют
              @else

                @foreach($orders as $order)
                  <tr>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->car->superstructure->superstructureName}} на шасси {{$order->car->baseAvto->avtoFirm->firmName}} - {{$order->car->baseAvto->modelName}}</td>
                    <td>
                      <div class = "d-flex">
                        <form method="POST" action="orders/{{$order->id}}">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Вы действительно хотите удалить заказ?');">Удалить</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
              </tbody>
            </table>


          @endif
        </div>
      </div>
    </div>
  </main>


@endsection
