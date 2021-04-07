@extends('layouts.layout')

@section('title')
    Подтвердите пароль
@endsection

@section('content')
    <main id="content">
      <div class="container">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <label for="password"> Пароль </label>

                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password">
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
      </div>
    </main>
@endsection
