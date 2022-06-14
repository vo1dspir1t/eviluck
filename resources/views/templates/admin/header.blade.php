<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('admin')}}">Eviluck Admin</a>
        <a href="{{route('Start')}}" class="nav-link">Вернуться на сайт</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex justify-content-end">
                <li class="nav-item me-2">
                    <a class="nav-link {{request()->routeIs('admin') ? 'active' : ''}}" aria-current="page" href="{{route('admin')}}">Главная</a>
                </li>
                @if(\App\Models\Admin::where('uid', '=', auth()->id()) != null)
                    <li class="nav-item me-2">
                        <a class="nav-link {{request()->routeIs('users.index') ? 'active' : ''}}" href="{{route('users.index')}}">О нас</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link {{request()->routeIs('contacts.index') ? 'active' : ''}}" href="{{route('contacts.index')}}">Контакты</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link {{request()->routeIs('portfolios.index') ? 'active' : ''}}" href="{{route('portfolios.index')}}">Портфолио</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
