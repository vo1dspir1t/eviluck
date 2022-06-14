<div class="header">
    <div class="container nav-header d-flex">
        <div class="brand-link">
            <a href="{{route('About')}}" class="nav-link">
                <h2>Eviluck</h2>
            </a>
            <i class="bi bi-caret-down-fill white" id="navbar"></i>
        </div>
        <div class="navbar">
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{route('About')}}" class="nav-link {{request()->routeIs('About') ? 'active' : ''}}">О нас</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('Contacts')}}" class="nav-link {{request()->routeIs('Contacts') ? 'active' : ''}}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('Portfolio')}}" class="nav-link {{request()->routeIs('Portfolio') ? 'active' : ''}}">Портфолио</a>
                </li>
            </ul>
        </div>
    </div>
</div>
