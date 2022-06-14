@extends('templates/admin/html')

@section('admin-content')
    @include('templates/admin/header')
    <div class="container my-2">
        <div class="card">
            <div class="card-header text-center">
                {{$user->initials}}
            </div>
            <div class="card-body">
                <a class="btn btn-outline-secondary mb-2" href="{{route('portfolios.index')}}">Назад</a>
                <div id="carousel" class="carousel slide position-relative" data-bs-ride="carousel">
                    @if($user->Images->count() > 0)
                        <form method="post" action="{{route('portfolios.destroy', $user->id)}}">
                            @csrf
                            @method('delete')
                            <div class="carousel-inner">
                                @foreach($user->Images as $Image)
                                    <div class="carousel-item position-relative {{($loop->first) ? 'active' : null}}">
                                        <img src="{{asset('storage/'.$Image->portfolio_image)}}" class="d-block w-100" alt="...">
                                        <input class="form-check-input position-absolute top-0 mt-5 start-50 translate-middle fs-1" name="images[]" type="checkbox" value="{{$Image->id}}">
                                    </div>
                                @endforeach
                                <button type="submit" class="btn btn-danger position-absolute translate-middle start-50 fs-3 bottom-0"><i class="bi bi-trash"></i></button>
                            </div>
                        </form>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="control my-2 d-flex w-100 justify-content-center">
                    <form method="post" class="me-3" enctype="multipart/form-data" action="{{route('portfolios.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <input class="form-control mb-2" type="file" multiple="multiple" name="works[]" placeholder="Файл аватара" accept="image/jpeg, image/png">
                        @error('works')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <button type="submit" class="btn btn-sm btn-outline-success fs-3 w-100"><i class="bi bi-plus-lg"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
