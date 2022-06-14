@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container my-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Данные пользователей из таблицы "Contacts"
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
                                        <th scope="col">header*</th>
                                        <th scope="col">content*</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="popover" title="Заголовок" data-bs-content="{{$value->header}}">
                                                    Показать
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="popover" title="Контент" data-bs-content="{{$value->content}}">
                                                    Показать
                                                </button>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('contacts.edit', $value)}}" class="btn btn-sm btn-outline-secondary me-2"><i class="bi bi-pencil-square"></i></a>
                                                    <form method="post" action="{{route('contacts.destroy', $value->id)}}">
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
                            <a href="{{route('contacts.create')}}" class="btn btn-sm btn-outline-success fs-3 w-25"><i class="bi bi-plus-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
