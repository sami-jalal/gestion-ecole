<ul class="nav flex-column">
  <li class="nav-item">
    <a @if($current_page == 'dashboard') class="nav-link active" @else class="nav-link" @endif href="{{ route('dashboard') }}">
      <span data-feather="home" class="align-text-bottom"></span>
      <i class="fas fa-laptop-code"></i> Tableau de bord
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('courses.get_all')}}">
      <span data-feather="users" class="align-text-bottom"></span>
      <i class="fas fa-microscope"></i> Gestion des cours
    </a>
  </li>
</ul>
