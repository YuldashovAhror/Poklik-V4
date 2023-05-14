@extends('layouts.auth.main')

@section('content')
    <div class="text-center mt-2">
        <h5 class="text-primary">Регистрация</h5>
    </div>
    <div class="p-2 mt-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="username">Имя</label>
                <input type="text" class="form-control" id="username" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label" for="useremail">Email</label>
                <input type="email" class="form-control" id="useremail" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label" for="userpassword">Пароль</label>
                <input type="password" class="form-control" id="userpassword" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label" for="userpassword">Подтвердите пароль</label>
                <input type="password" class="form-control" id="userpassword" name="password_confirmation">
            </div>
            <div class="mt-3 text-end">
                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Зарегистрироваться</button>
            </div>
            <div class="mt-4 text-center">
                <p class="text-muted mb-0">Уже есть аккаунт ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Войти</a></p>
            </div>
        </form>
    </div>
@endsection


