@extends('templates/html')

@section('title', 'Портфолио')

@section('content')
    @include('templates/header')
    <div class="wrapper">
        <div class="container">
            <div class="block cards">
                @foreach($users as $user)
                    <div class="card">
                        <div class="card-avatars">
                            <img src="{{asset('storage/'.$user->avatar)}}" class="card-avatar rounded">
                        </div>
                        <div class="card-info">
                            <h3>{{$user->initials}}</h3>
                            <p>{{$user->profession}}</p>
                            <p>Телефон: +{{$user->phone}}</p>
                            @if(isset($user->link))
                                <a href="{{$user->link}}" class="nav-link" target="_blank">{{$user->linkDesc}}</a>
                            @endif
                        </div>
                        <ul class="card-works">
                            @foreach($user->Images as $image)
                                <li><img src="{{asset('storage/'.$image->portfolio_image)}}"></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('templates/footer')
@endsection

