<ul class="nav flex-column">
  <li class="nav-item">
    <a @if($current_page == 'dashboard') class="nav-link active" @else class="nav-link" @endif href="{{ route('dashboard') }}">
      <span data-feather="home" class="align-text-bottom"></span>
      <i class="fas fa-laptop-code"></i> Tableau de bord
    </a>
  </li>
  <li class="nav-item">
    <a @if($current_page == 'admins') class="nav-link active" @else class="nav-link" @endif href="{{ route('users.get_all') }}">
      <span data-feather="file" class="align-text-bottom"></span>
      <i class="fas fa-users-cog"></i> Gestion des Utilisateurs
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="shopping-cart" class="align-text-bottom"></span>
      <i class="fas fa-user-graduate"></i> Gestion des étudiants
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="users" class="align-text-bottom"></span>
      <i class="fas fa-microscope"></i> Gestion des cours
    </a>
  </li>
</ul>

  {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
    <span>Saved reports</span>
    <a class="link-secondary" href="#" aria-label="Add a new report">
      <span data-feather="plus-circle" class="align-text-bottom"></span>
    </a>
  </h6>
  <ul class="nav flex-column mb-2">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text" class="align-text-bottom"></span>
        Current month
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text" class="align-text-bottom"></span>
        Last quarter
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text" class="align-text-bottom"></span>
        Social engagement
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span data-feather="file-text" class="align-text-bottom"></span>
        Year-end sale
      </a>
    </li>
  </ul> --}}