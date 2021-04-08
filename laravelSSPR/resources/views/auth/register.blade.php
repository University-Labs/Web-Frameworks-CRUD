@extends('layouts.layout')

@section('title')
    Регистрация
@endsection

@section('content')
    <main id="content">
        <div class="container">
            <div class="register-block">
                <h1>Регистрация </h1>
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" class="register-form" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="username" class="col-form-label col-sm-3"> Логин </label>
                        <div class="col-sm-9">
                            <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required autofocus >
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-sm-3"> Эл. адрес </label>
                        <div class="col-sm-9">
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="col-form-label col-sm-3"> Пароль </label>
                        <div class="col-sm-9">
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-form-label col-sm-3"> Подтверждение пароля </label>
                        <div class="col-sm-9">
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="authorize">
                        <button type="submit" class="btn btn-warning">
                            Зарегистрироваться
                        </button>
                        <a class="btn btn-link" href="{{ route('login') }}">
                            Уже зарегистрированы? Войти
                        </a>
                    </div>


                </form>
            </div>
        </div>
    </main>
@endsection