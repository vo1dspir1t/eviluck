@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container my-5">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Данные пользователей из таблицы "Portfolios"
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
                                        <th scope="col">User</th>
                                        <th scope="col">Works</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>
                                                <a href="{{route('portfolios.show', $value)}}">{{$value->initials}}</a>
                                            </td>
                                            <td>
                                                {{$value->Images->count()}}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{route('portfolios.edit', $value->id)}}" class="btn btn-sm btn-outline-secondary me-2"><i class="bi bi-pencil-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
