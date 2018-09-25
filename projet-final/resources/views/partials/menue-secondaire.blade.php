<footer>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <ul class="nav">
        <li class="nav-item active"><a class="nav-link text-white" href="{{route('home')}}">Accueil</a></li>
        <li class="nav-item active"><a class="nav-link text-white" href="{{route('stages')}}">Stage</a></li>
        <li class="nav-item active"><a class="nav-link text-white" href="{{route('formations')}}">Formation</a></li>
        @guest
          <li class="nav-item active"><a class="nav-link text-white" href="{{route('contact')}}">Contact</a></li>
        @else
          
        @endguest
      </ul>

      @guest
        
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
</footer>