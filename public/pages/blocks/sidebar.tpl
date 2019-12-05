<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - HTVEDU -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-shield-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">HTV Politie </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
    <a class="nav-link" href="index.php?p=dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Users Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesUser" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-users"></i>
            <span>Gebruikers</span>
        </a>
        <div id="collapsePagesUser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?p=users">Overzicht</a>
                <a class="collapse-item" href="index.php?p=useradd">Toevoegen</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Results -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Resultaten</span>
        </a>
    </li>

    <!-- Nav Item - Quiz Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesQuiz" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-book"></i>
            <span>Toetsen</span>
        </a>
        <div id="collapsePagesQuiz" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="index.php?p=quiz">Bekijken</a>
                <a class="collapse-item" href="index.php?p=quizadd">Toevoegen</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Measure -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-pie"></i>
            <span>Beoordelen</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Settings -->
    <li class="nav-item">
        <a class="nav-link" href="index.php?p=settings">
            <i class="fas fa-fw fa-cog"></i>
            <span>Instellingen</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Help -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>Help</span></a>
    </li>

    <!-- Nav Item - Contact -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Contact</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>