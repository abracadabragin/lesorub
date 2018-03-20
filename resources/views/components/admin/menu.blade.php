<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="/">@yield('nav-title')</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAdmin"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex" id="navbarAdmin">

            <ul class="navbar-nav mr-auto">
                @auth
                    @if(Route::currentRouteName() === "index")
                        <li class="nav-item">
                            <a class="nav-link" href='{{ route('createProduct') }}'>Добавить проект</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='{{ route('createFeedback') }}'>Добавить отзыв</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class='nav-link' href='{{ route('index') }}'>Назад</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                            Выйти
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>

        </div>

    </div>

</nav>