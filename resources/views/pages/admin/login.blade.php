@extends('templates/admin/html')

@section('admin-content')
    <div class="d-flex justify-content-center position-absolute h-100 w-100">
        <form class="col-md-4 p-5 rounded d-flex flex-column border align-self-sm-center" method="post" action="{{route('login')}}">
            @csrf
            <img src="/images/eviluck-black.png" class="w-50 align-self-center">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Пароль</label>
                <input type="password" class="form-control" name="password">
                <div class="form-check my-2">
                    <input class="form-check-input" type="checkbox" name="remember_me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Запомнить меня
                    </label>
                </div>
            </div>
            @error('error')
                <div class="alert alert-danger text-center" role="alert">
                    {{$message}}
                </div>
            @enderror
            <button type="submit" class="btn btn-success w-100 align-self-center mb-2">Войти</button>
            <a href="{{route('register')}}" class="btn btn-outline-primary w-100 align-self-center">Зарегистрироваться</a>
        </form>
    </div>
@endsection
