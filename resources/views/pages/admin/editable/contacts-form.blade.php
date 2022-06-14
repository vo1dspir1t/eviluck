@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container col-lg-4 my-5">
        <div class="d-flex flex-column">
            <form class="needs-validation" method="post" @if(isset($contact))
            action="{{route('contacts.update', $contact)}}"
                  @else
                  action="{{route('contacts.store')}}"
                @endif>
                @csrf
                @isset($contact)
                    @method('put')
                @endisset
                <div id="emailHelp" class="form-text">Обязательное поле</div>
                <input type="text" class="form-control mb-2" name="header" placeholder="Заголовок" value="{{isset($contact) ? $contact->header : null}}">
                @error('header')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <div id="emailHelp" class="form-text">Обязательное поле</div>
                <div class="form-floating w-100 mb-2">
                    <textarea class="form-control" placeholder="content" name="content" style="height: 60vh; resize: none;">{{isset($contact) ? $contact->content : null}}</textarea>
                    <label for="content">Содержимое</label>
                </div>
                @error('content')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @enderror
                <button type="submit" class="btn btn-success">Сохранить</button>
                <a class="btn btn-outline-secondary" href="{{route('contacts.index')}}">Назад</a>
            </form>
        </div>
    </div>
@endsection
