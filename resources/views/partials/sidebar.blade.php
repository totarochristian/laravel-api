<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href={{ url('/') }}>
        <div class="sidebar-brand-icon">
            <i class="fa-regular fa-newspaper"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Boolfolio</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Entities
    </div>

    <!-- Nav Item Menu -->
    <li class="nav-item">
        <a class="nav-link" role="button" href="{{ route('admin.projects.index') }}">
            <i class="fa-solid fa-note-sticky"></i>
            <span>Projects</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Categories</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.tags.index') }}">
            <i class="fa-solid fa-tags"></i>
            <span>Tags</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
