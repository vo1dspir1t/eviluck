@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-center">
                {{$user->initials}}
            </div>
            <div class="card-body">
                <a class="btn btn-outline-secondary mb-2" href="{{route('portfolios.index')}}">Назад</a>
                <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($user->Images as $Image)
                                <div class="carousel-item position-relative {{($loop->first) ? 'active' : null}}">
                                    <img src="{{asset('storage/'.$Image->portfolio_image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
