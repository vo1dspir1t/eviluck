@extends('templates/html')

@section('title', 'Start')

@section('content')
    <div class="brand">
        <div class="brand-text">
            <h3>Welcome to EVILUCK!</h3>
            <a href="{{route('About')}}" class="btn btn-dark-outline w-50">Начать</a>
        </div>
    </div>
@endsection
