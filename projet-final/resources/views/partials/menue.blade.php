<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"><a class="nav-link" href="{{route('home')}}">Accueil</a></li>
      <li class="nav-item active"><a class="nav-link" href="{{route('stages')}}">Stage</a></li>
      <li class="nav-item active"><a class="nav-link" href="{{route('formations')}}">Formation</a></li>
      <li class="nav-item active"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
    </ul>

    <form class="form-inline my-2 my-lg-0"  action="{{route('search')}}" method="get">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>
</header>