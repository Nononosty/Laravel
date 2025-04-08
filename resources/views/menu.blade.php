<header class="mb-4">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Экземпляры
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('copy') }}">Все экземпляры</a></li>
                            <li><a class="dropdown-item" href="{{ url('copy/create') }}">Добавить экземпляр</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('edition') }}">Издания</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('lending') }}">Выданные книги</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check() && Auth::user()->is_admin)
                            <a class="nav-link" href="{{ url('lending/all') }}">Все выдачи</a>
                        @endif
                    </li>
                </ul>

                @if(!Auth::user())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="{{ route('login') }}">Войти</a>
                    </li>
                </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="fa fa-user" style="font-size:20px;color:white;"></i> {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="{{ url('logout') }}">Выйти</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
