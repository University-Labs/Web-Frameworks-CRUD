@extends('layouts.layout')

@section('title')
    Сброс пароля
@endsection

@section('content')
    <main id="content">
      <div class="container">
        <h1> Сброс пароля </h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email"> Email </label>
                <input id="email" class="block" type="email" name="email" value=" {{ old('email', $request->email) }} " required autofocus>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password"> Password </label>
                <input id="password" class="block" type="password" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation"> Confirm Password </label>
                <input id="password_confirmation" class="block" type="password" name="password_confirmation" required>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-warning"> Reset Password </button>
            </div>
        </form>
      </div>
    </main>
@endsection