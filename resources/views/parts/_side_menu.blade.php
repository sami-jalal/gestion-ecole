<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 logo_sidemenu">
            <img id="logo_menu" src="{{asset('images/logo.png')}}" alt="Gestion établissment scolaire"> 
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 title_sidemenu">
            <h4 class="logo_title">Gestion établissment scolaire</h4>
        </div>
    </div>
    <hr class="separator">
     
    <div class="position-sticky pt-3 sidebar-sticky">
       @include('menus.' . auth()->user()->role . '_links')
    </div>
</nav>