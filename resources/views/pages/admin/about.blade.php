@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container-fluid my-5 p-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Данные пользователей из таблицы "Abouts"
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="overflow-scroll d-flex justify-content-between">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">avatar</th>
                                        <th scope="col">initials*</th>
                                        <th scope="col">profession*</th>
                                        <th scope="col">info</th>
                                        <th scope="col">email*</th>
                                        <th scope="col">contact_email*</th>
                                        <th scope="col">phone*</th>
                                        <th scope="col">linkDesc</th>
                                        <th scope="col">link</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                            @if($value->id == auth()->id())
                                                @continue
                                            @endif
                                            <tr>
                                                <th scope="row">{{$value->id}}</th>
                                                <td>{{$value->avatar}}</td>
                                                <td>{{$value->initials}}</td>
                                                <td>{{$value->profession}}</td>
                                                <td>
                                                    @if(isset($value->info))
                                                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="popover" title="Информация" data-bs-content="{{$value->info}}">
                                                            Показать
                                                        </button>
                                                    @endif
                                                </td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->contact_email}}</td>
                                                <td>+{{$value->phone}}</td>
                                                <td>{{$value->linkDesc}}</td>
                                                <td>{{$value->link}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{route('users.edit', $value)}}" class="btn btn-sm btn-outline-secondary me-2"><i class="bi bi-pencil-square"></i></a>
                                                        <form method="post" action="{{route('users.destroy', $value->id)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <a href="{{route('users.create')}}" class="btn btn-sm btn-outline-success fs-3 w-25"><i class="bi bi-plus-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
