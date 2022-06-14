@extends('templates/admin/html')

@section('admin-content')
    <div class="d-flex justify-content-center position-absolute h-100 w-100">
        <form class="col-md-4 p-5 rounded d-flex flex-column border align-self-sm-center" method="POST" action="{{route('register')}}">
            @csrf
            <img src="/images/eviluck-black.png" class="w-25 align-self-center">
            <div class="mb-3">
                <label class="form-label">ФИО</label>
                <input type="text" class="form-control" name="initials">
                @error('initials')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Профессия</label>
                <input type="text" class="form-control" name="profession">
                @error('profession')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
                <div id="emailHelp" class="form-text">Указанная эл. почта используется для входа в систему администрирования.</div>
                @error('email')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Контактный email</label>
                <input type="email" class="form-control" name="contact_email">
                @error('contact_email')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Контактный телефон</label>
                <input type="number" class="form-control" name="phone">
                @error('phone')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password">
                @error('password')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-success w-100 align-self-center mb-2">Зарегистрироваться</button>
            <a href="{{route('login')}}" class="btn btn-outline-primary w-100 align-self-center">Войти</a>
        </form>
    </div>
@endsection
