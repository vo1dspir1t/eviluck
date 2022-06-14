@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container py-3">
        <div class="d-md-flex justify-content-md-between">
            @if(\App\Models\About::find(auth()->id())->Admin != null)
                <div class="col-md-4 text-wrap">
                    <div class="col-md-12 mb-3 me-3 border p-3 text-center rounded">
                        <h5>Пользователей: <span id="userCounter">{{\App\Models\About::all()->count()}}</span></h5>
                    </div>
                    <div class="col-md-12 mb-3 me-3 border p-3 text-center rounded">
                        <h5>Изображений: <span id="imagesCounter">{{\App\Models\Portfolio::all()->count()}}</span></h5>
                    </div>
                    <div class="col-md-12 mb-3 me-3 border p-3 text-center rounded">
                        <h5>Администраторов: <span id="adminsCounter">{{\App\Models\Admin::all()->count()}}</span></h5>
                    </div>
                </div>
            @endif
            <div class="{{(\App\Models\About::find(auth()->id())->Admin != null) ? 'col-md-7' : 'col-md-12'}} border rounded p-3">
                <h2 class="text-center">Информация</h2>
                <hr>
                <div class="user col-xxl-12 d-xxl-flex justify-content-xxl-center">
                    <img src="/images/eviluck-black.png" class="col-xxl-3 img-fluid img-thumbnail me-3">
                    <div class="user-info text-center">
                        <h4>{{auth()->user()->initials}}</h4>
                        <p>{{auth()->user()->profession}}</p>
                        <div class="badge {{isset(\App\Models\About::find(auth()->id())->Admin) ? 'bg-success' : 'bg-secondary'}} w-100 fs-6 mb-3">
                            {{isset(\App\Models\About::find(auth()->id())->Admin) ? 'Администратор' : 'Пользователь'}}
                        </div>
                        <div class="buttons d-flex justify-content-between">
                            <a href="{{route('account')}}" class="btn btn-outline-dark"><i class="bi bi-gear"></i></a>
                            <a href="{{route('logout')}}" class="btn btn-outline-danger">Выйти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
