
@extends('layouts.layout')

@section('title')
    Вход в систему
@endsection

@section('content')
    <main id="content">
        <div class="container">
            <div class="login-block">
                <h1>Вход </h1>
                <form method="POST" class="login-form" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email"> Логин </label>
                        <input id="email" class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Логин" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password"> Пароль </label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Пароль">
                    </div>

                    <!-- Remember Me -->
                    <div class="block-remember-me">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">Запомнить</span>
                        </label>
                    </div>

                    <div class="flex">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>


                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Забыли пароль?
                        </a>
                    @endif
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection