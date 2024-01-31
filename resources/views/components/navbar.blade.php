<nav class="navbar navbar-expand-lg bg-mygray mx-0 fixed-top">
    <div class="container-fluid mx-0">
      <a href="{{route('home')}}"><img class="logo-style" src="/storage/image/logo1.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href={{route('home')}}>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href={{route('article.index')}}>Articoli</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href={{route('article.create')}}>Inserisci annuncio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href={{route('careers')}}>Lavora con noi</a>
          </li>
    
          @endauth
        @guest
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('register')}}">Registrati</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{route('login')}}">Accedi</a>
        </li>
        @endguest
        </ul>
        @auth
        <ul class="navbar-nav mb-2 me-3  mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu bg-mygray">
                <form method="POST" action="{{route('logout')}}">
                  @csrf
                  <button class="dropdown-item text-white btn-logout" type="submit">Logout</button>
                </form>
              </ul>
          </li>
                @if(Auth::user()->is_admin)
                  <li class="nav-item"><a class="nav-link dashboard-a" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                @endif
                @if(Auth::user()->is_revisor)
                  <li class="nav-item"><a class="nav-link dashboard-a" href="{{route('revisor.dashboard')}}">Dashboard</a></li>
                @endif
                @if(Auth::user()->is_writer)
                <li class="nav-item"><a class="nav-link dashboard-a" href="{{route('writer.dashboard')}}">Dashboard</a></li>
                @endif
        </ul>
        @endauth
        <form class="d-flex" method="GET" action="{{route('article.search')}}" role="search">
          <input class="form-control me-2" type="search" name="query" placeholder="Cerca" aria-label="Search">
          <button class="btn-custom" type="submit">Cerca</button>
        </form>
      </div>
    </div>
  </nav>