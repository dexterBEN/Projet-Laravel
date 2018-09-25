<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <ul class="navbar-nav mr-auto">
        {{--Vérifie si l'administrateur est authentifier si oui on affiche pas cette partie du menue :--}}
        
          <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Accueil</a></li>
          <li class="nav-item active"><a class="nav-link" href="{{route('stages')}}">Stage</a></li>
          <li class="nav-item active"><a class="nav-link" href="{{route('formations')}}">Formation</a></li>
          
        @guest
          <li class="nav-item active"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
        @else
          
        @endguest
      </ul>
      
      @guest
        <form class="form-inline my-2 my-lg-0"  action="{{route('search')}}" method="get">
          <input name="search" class="form-control mr-sm-2" type="search" placeholder="recherche" aria-label="Search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
      @else
        <ul class="nav">
          <li class="nav-item active"><a class="nav-link text-white" href="{{route('post.index')}}">dashboard</a></li>
          <li class="nav-item active">
            <a class="nav-link text-white"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      @endguest
    </div>
  </nav>
</header>