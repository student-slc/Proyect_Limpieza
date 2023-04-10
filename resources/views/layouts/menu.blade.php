<li class="side-menus active">
    <br>
    @can('opcion_dash')
        <a class="nav-link active" href="/home">
            <i class=" fas fa-building"></i><span>Dashboard</span>
        </a>
    @endcan
    @can('opcion_user')
        <a class="nav-link" href="/usuarios">
            <i class=" fas fa-users"></i><span>Usuario</span>
        </a>
    @endcan
    @can('opcion_rol')
        <a class="nav-link" href="/roles">
            <i class=" fas fa-user-lock"></i><span>Roles</span>
        </a>
    @endcan
    @can('opcion_chotel')
        <a class="nav-link" href="/cadenahotelera">
            <i class=" fas fa-city"></i><span>Cadena Hotelera</span>
        </a>
    @endcan
    @can('opcion_camar')
        <a class="nav-link" href="/camaristas">
            <i class=" fas fa-city"></i><span>Camaristas</span>
        </a>
    @endcan
    @can('opcion_cuest')
        <a class="nav-link" href="/cuestionario">
            <i class=" fas fa-question"></i><span>Cuestionario</span>
        </a>
    @endcan
</li>
