<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
       @include('menus.' . auth()->user()->role . '_links')
    </div>
</nav>