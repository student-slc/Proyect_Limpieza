@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">

                                    <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>
                                                @php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$cant_usuarios}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5>
                                                @php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span>{{$cant_roles}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                            <h5>Cadenas Hoteleras</h5>
                                                @php
                                                use App\Models\Cadenahotelera;
                                                 $cant_cadena = Cadenahotelera::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-city f-left"></i><span>{{$cant_cadena}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/cadenahotelera" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                            <h5>Hoteles</h5>
                                                @php
                                                use App\Models\Hotele;
                                                 $cant_hotele = Hotele::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-city f-left"></i><span>{{$cant_hotele}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/hoteles" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                            <h5>Camaristas</h5>
                                                @php
                                                use App\Models\Camarista;
                                                 $cant_camaristas = Camarista::count();
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-city f-left"></i><span>{{$cant_camaristas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/camaristas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

