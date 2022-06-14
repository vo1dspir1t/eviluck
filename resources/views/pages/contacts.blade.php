@extends('templates/html')

@section('title', 'Контакты')

@section('content')
    @include('templates/header')
    <div class="wrapper d-flex align-center">
        <div class="container">
            <div class="block flex-column">
                <div class="contact-info">
                    @if(isset($info))
                    <div class="main-contacts">
                        @foreach($info as $value)
                            <h2>{{$value->header}}</h2>
                            <p>{{$value->content}}</p>
                        @endforeach
                    </div>
                    @endif
                    @if(isset($devs))
                        <div class="devs-contacts">
                        @foreach($devs as $value)

                                <div class="contact-item">
                                    <h3>{{$value->initials}}</h3>
                                    <p>Email: {{$value->contact_email}}</p>
                                    <p>Телефон: +{{$value->phone}}</p>
                                    @if(isset($value->link))
                                        <a href="{{$value->link}}" class="nav-link" target="_blank">{{$value->linkDesc}}</a>
                                    @endif
                                </div>
                        @endforeach
                        </div>
                    @endif
                </div>
                <div class="maps p-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d20309.075323923767!2d30.4721233!3d50.4851493!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1642532910023!5m2!1sru!2s" style="border:0;" loading="lazy" class="w-100 h-25 rounded"></iframe>
                </div>
            </div>
        </div>
    </div>
    @include('templates/footer')
@endsection
