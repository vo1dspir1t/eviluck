@extends('templates/html')

@section('title', 'О нас')

@section('content')
    @include('templates/header')
    <div class="wrapper">
        <div class="container blocks">
            @foreach($data as $value)
            <div class="block">
                <img src="{{asset('storage/'.$value->avatar)}}" class="avatar circle">
                <div class="info">
                    <h2>{{$value->initials}}</h2>
                    <h3>{{$value->profession}}</h3>
                    <p>{{$value->info}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('templates/footer')
@endsection
