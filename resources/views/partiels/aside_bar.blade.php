    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-user-md"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Registre Cancers</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a>
      </li>
      @ifUserIs('doc')
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-chart-bar"></i>
          <span>Statistiques</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      @endif

      @ifUserCan('employe.create', 'employe.index')
      <div class="sidebar-heading">
        Employés
      </div>

       <!-- Nav Item - Pages Collapse Menu -->
       
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-users"></i>
          <span>Employés</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Des Employés :</h6>
            @ifUserCan('employe.create')
            <a class="collapse-item" href="{{ route('employe.create') }}">Ajouter un employé</a>
            @endif
            @ifUserCan('employe.index')
            <a class="collapse-item" href="{{ route('employe.index') }}">Liste des employés</a>
            @endif
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      @endif
      
      @ifUserCan('patient.create', 'patient.index')
      <!-- Heading -->
      <div class="sidebar-heading">
        Patients
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-users"></i>
          <span>Patients</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Déclarations Des Patients :</h6>
            @ifUserCan('patient.create')
            <a class="collapse-item" href="{{ route('patient.create') }}">Déclarer un patient</a>
            @endif
            @ifUserCan('patient.index')
            <a class="collapse-item" href="{{ route('patient.index') }}">Liste des déclarations</a>
            @endif
          </div>
        </div>
      </li>
      @endif
      <!-- Divider -->
      <!-- Nav Item - Pages Collapse Menu -->
      @ifUserCan('permission.create', 'permission.index')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-angle-right"></i>
          <span>Permissions</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Des Permissions :</h6>
            @ifUserCan('permission.create')
            <a class="collapse-item" href="{{ route('permission.create') }}">Ajouter une permission</a>
            @endif
            @ifUserCan('permission.index')
            <a class="collapse-item" href="{{ route('permission.index') }}">Liste des permissions</a>
            @endif
          </div>
        </div>
      </li>
      @endif
      <!-- Divider -->
      <!-- Nav Item - Pages Collapse Menu -->
      @ifUserCan('role.create', 'role.index')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-angle-right"></i>
          <span>Rôles</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Des Rôles :</h6>
            @ifUserCan('role.create')
            <a class="collapse-item" href="{{ route('role.create') }}">Ajouter un rôle</a>
            @endif
            @ifUserCan('role.create')
            <a class="collapse-item" href="{{ route('role.index') }}">Liste des rôles</a>
            @endif
          </div>
        </div>
      </li>
      @endif
       <!-- Divider -->
      <!-- Nav Item - Pages Collapse Menu -->
      @ifUserCan('user.create', 'user.index')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-angle-right"></i>
          <span>Utilisateurs</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion Des Utilisateurs :</h6>
            @ifUserCan('user.create')
            <a class="collapse-item" href="{{ route('user.create') }}">Ajouter un utilisateur</a>
            @endif
            @ifUserCan('user.index')
            <a class="collapse-item" href="{{ route('user.index') }}">Liste des utilisateurs</a>
            @endif
          </div>
        </div>
      </li>
      @endif
    </ul>
    <!-- End of Sidebar -->