@extends('layouts.auth.main')

@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">Добро пожаловать !</h5>
    </div>
    <div class="p-2 mt-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="username">Логин</label>
                <input type="text" class="form-control" id="username" name="email">
            </div>

            <div class="mb-3">
                <label class="form-label" for="userpassword">Пароль</label>
                <input type="password" class="form-control" id="userpassword" name="password">
            </div>

            <div class="mt-3 text-end">
                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Войти</button>
            </div>

            <div class="mt-4 text-center">
                <p class="mb-0">Нет аккаунта ? <a href="{{ route('register') }}" class="fw-medium text-primary"> Зарегистрироваться </a> </p>
            </div>
        </form>
    </div>
@endsection