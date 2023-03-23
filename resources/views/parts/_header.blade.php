

  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-3 offset-lg-10 offset-md-10">
        <div class="dropdown text-end" >
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="{{route('profile.edit')}}">
                <i class="fas fa-id-card"></i> Mon profile 
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-block btn-warning btn-sm"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
            </form></a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </header>