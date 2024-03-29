<header id="header" class="fixed-top">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a href="{{url('/')}}" class="navbar-brand">Спец. техника</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent"
            aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a href="{{url('/')}}" class="nav-link">Главная</a>
              </li>

              <li class="nav-item">
                <a href="{{route('catalog')}}" class="nav-link">Каталог</a>
              </li>

              @role('admin')
                <li class="nav-item">
                  <a href="{{route('cars.list')}}" class="nav-link">Режим администратора</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dictionarities" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Справочники
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dictionarities">
                    <li class="nav-item"><a class="dropdown-item" href="{{route('categories.list')}}">Категории</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="{{route('superstructures.list')}}">Надстройки</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="{{route('bases.list')}}">База авто</a></li>
                    <li class="nav-item"><a class="dropdown-item" href="{{route('avtofirms.list')}}">Фирмы авто</a></li>
                  </ul>
                </li>
              @endrole

              </ul>


            <div class="navbar-nav ms-auto">
              @if (Route::has('login'))
                    @auth
                      <form method="POST" class="row" action="{{ route('logout') }}">
                        @csrf
                        <div class="col">
                          <a id="userLink" class="nav-link nav-item" href="{{route ('users.index', Auth::user()->id) }}">
                            {{ Auth::user()->username }}
                          </a>
                        </div>
                        <div class="col">
                          <button type="submit" class="btn nav-item nav-link">Выход</button>
                        </div>
                      </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-item nav-link">Вход</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-item nav-link">Регистрация</a>
                        @endif
                    @endauth
              @endif
            </div>

          </div>
        </div>
      </nav>
</header>