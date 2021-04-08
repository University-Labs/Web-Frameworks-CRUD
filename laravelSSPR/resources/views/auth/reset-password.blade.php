@extends('layouts.layout')

@section('title')
    Сброс пароля
@endsection

@section('content')
    <main id="content">
      <div class="container">
        <h1> Сброс пароля </h1>
        @if ($errors->any())
            <div class="font-medium text-sm text-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="row mb-3">
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email"> Email </label>
                    <input id="email" class="form-control" type="email" name="email" value=" {{ old('email', $request->email) }} " required autofocus>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password"> Новый пароль </label>
                    <input id="password" class="form-control" type="password" name="password" required>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation"> Подтвердите пароль </label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                </div>

            </div>
                <div>
                    <button type="submit" class="btn btn-warning"> Сбросить пароль </button>
                </div>

        </form>
      </div>
    </main>
@endsection