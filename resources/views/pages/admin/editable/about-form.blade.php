@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
        <div class="container col-lg-4 my-5">
            <div class="d-flex flex-column">
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data" @if(isset($user))
                    action="{{route('users.update', $user)}}"
                    @else
                    action="{{route('users.store')}}"
                    @endif>
                    @csrf
                    @isset($user)
                        @method('put')
                        <label for="formFileMultiple" class="form-label">Файл аватара</label>
                        <input class="form-control mb-2" type="file" name="avatarFile" placeholder="Файл аватара" accept="image/jpeg, image/png">
                        @error('avatarFile')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    @endisset
                    <div id="emailHelp" class="form-text">Обязательное поле</div>
                    <input type="text" class="form-control mb-2" name="initials" placeholder="ФИО" required value="{{isset($user) ? $user->initials : null}}">
                    @error('initials')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label class="form-label">Новый пароль</label>
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
                    <div id="emailHelp" class="form-text">Обязательное поле</div>
                    <input type="text" class="form-control mb-2" name="profession" placeholder="Профессия" required value="{{isset($user) ? $user->profession : null}}">
                    @error('profession')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-floating w-100 mb-2">
                        <textarea class="form-control" name="info" placeholder="Информация здесь" id="floatingTextarea2" style="height: 20vh; resize: none;" required>{{isset($user) ? $user->info : null}}</textarea>
                        <label for="floatingTextarea2">Информация</label>
                    </div>
                    @error('info')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div id="emailHelp" class="form-text">Обязательное поле</div>
                    <input type="email" class="form-control mb-2" name="email" placeholder="Email" required value="{{isset($user) ? $user->email : null}}">
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div id="emailHelp" class="form-text">Обязательное поле</div>
                    <input type="email" class="form-control mb-2" name="contact_email" placeholder="Контактный email" required value="{{isset($user) ? $user->contact_email : null}}">
                    @error('contact_email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div id="emailHelp" class="form-text">Обязательное поле</div>
                    <input type="number" class="form-control mb-2" name="phone" placeholder="Телефон" required value="{{isset($user) ? $user->phone : null}}">
                    @error('phone')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="text" class="form-control mb-2" name="linkDesc" placeholder="Описание ссылки" value="{{isset($user) ? $user->linkDesc : null}}">
                    @error('linkDesc')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <input type="url" class="form-control mb-2" name="link" placeholder="Ссылка" value="{{isset($user) ? $user->link : null}}">
                    @error('link')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    @if(isset($user))
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Доступ</label>
                            <select class="form-select" name="access">
                                <option value="0" {{(!isset($user->Admin)) ? 'selected' : null}}>Пользователь</option>
                                <option value="1" {{(isset($user->Admin)) ? 'selected' : null}}>Администратор</option>
                            </select>
                        </div>
                        @error('access')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    @endif
                    <button type="submit" class="btn btn-success">Сохранить</button>
                    <a class="btn btn-outline-secondary" href="{{route('users.index')}}">Назад</a>
                </form>
            </div>
        </div>
@endsection
