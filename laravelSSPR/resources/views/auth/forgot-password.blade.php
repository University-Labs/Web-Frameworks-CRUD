@extends('layouts.layout')

@section('title')
    Вход в систему
@endsection

@section('content')

        <div class="mb-4 text-sm text-gray-600">
            Забыли пароль? Введите почту и вам будет отправлена ссылка для сброса пароля
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email"> E-mail адрес </label>

                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-warning">
                    Сброс пароля
                </button>
            </div>
        </form>
      </div>
    </main>
@endsection
