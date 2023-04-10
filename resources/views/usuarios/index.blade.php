@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-usuario')
                                <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Agregar Usuario</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#00C0F5">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">E-mail</th>
                                    <th style="color:#fff;">Hotel</th>
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    {{-- ----------------------------------------------------------------------------- --}}
                                    @can('todos_hoteles')
                                        @foreach ($usuario as $usuarios)
                                            <tr>
                                                <td style="display: none;">{{ $usuarios->id }}</td>
                                                <td>{{ $usuarios->name }}</td>
                                                <td>{{ $usuarios->email }}</td>
                                                <td>{{ $usuarios->hotel }}</td>
                                                <td>
                                                    @if (!empty($usuarios->getRoleNames()))
                                                        @foreach ($usuarios->getRoleNames() as $rolNombre)
                                                            <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-info"
                                                            href="{{ route('usuarios.edit', $usuarios->id) }}">
                                                            <i class="fas fa-edit"></i></a>

                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['usuarios.destroy', $usuarios->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}
                                                        {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endcan
                                    {{-- ----------------------------------------------------------------------------- --}}
                                    @can('por_hotel')
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        @can('camarista')
                                            @foreach ($usuario as $usuarios)
                                                @if ($usuarios->rol == 'Camarista')
                                                    <tr>
                                                        <td style="display: none;">{{ $usuarios->id }}</td>
                                                        <td>{{ $usuarios->name }}</td>
                                                        <td>{{ $usuarios->email }}</td>
                                                        <td>{{ $usuarios->hotel }}</td>
                                                        <td>
                                                            @if (!empty($usuarios->getRoleNames()))
                                                                @foreach ($usuarios->getRoleNames() as $rolNombre)
                                                                    <h5><span class="badge badge-dark">{{ $rolNombre }}</span>
                                                                    </h5>
                                                                @endforeach
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="btn-group">
                                                                @can('editar-usuario')
                                                                    <a class="btn btn-info"
                                                                        href="{{ route('usuarios.edit', $usuarios->id) }}">
                                                                        <i class="fas fa-edit"></i></a>
                                                                @endcan
                                                                {!! Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['usuarios.destroy', $usuarios->id],
                                                                    'style' => 'display:inline',
                                                                ]) !!}
                                                                @can('borrar-usuario')
                                                                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                                @endcan
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endcan
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        @can('supervisor')
                                            @foreach ($usuario as $usuarios)
                                                @if ($usuarios->rol == 'Camarista' || $usuarios->rol == 'Supervisor')
                                                    <tr>
                                                        <td style="display: none;">{{ $usuarios->id }}</td>
                                                        <td>{{ $usuarios->name }}</td>
                                                        <td>{{ $usuarios->email }}</td>
                                                        <td>{{ $usuarios->hotel }}</td>
                                                        <td>
                                                            @if (!empty($usuarios->getRoleNames()))
                                                                @foreach ($usuarios->getRoleNames() as $rolNombre)
                                                                    <h5><span class="badge badge-dark">{{ $rolNombre }}</span>
                                                                    </h5>
                                                                @endforeach
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-info"
                                                                    href="{{ route('usuarios.edit', $usuarios->id) }}">
                                                                    <i class="fas fa-edit"></i></a>

                                                                {!! Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['usuarios.destroy', $usuarios->id],
                                                                    'style' => 'display:inline',
                                                                ]) !!}
                                                                {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endcan
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        @can('gerente')
                                            @foreach ($usuario as $usuarios)
                                                @if ($usuarios->rol == 'Camarista' || $usuarios->rol == 'Supervisor' || $usuarios->rol == 'Gerente')
                                                    <tr>
                                                        <td style="display: none;">{{ $usuarios->id }}</td>
                                                        <td>{{ $usuarios->name }}</td>
                                                        <td>{{ $usuarios->email }}</td>
                                                        <td>{{ $usuarios->hotel }}</td>
                                                        <td>
                                                            @if (!empty($usuarios->getRoleNames()))
                                                                @foreach ($usuarios->getRoleNames() as $rolNombre)
                                                                    <h5><span class="badge badge-dark">{{ $rolNombre }}</span>
                                                                    </h5>
                                                                @endforeach
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-info"
                                                                    href="{{ route('usuarios.edit', $usuarios->id) }}">
                                                                    <i class="fas fa-edit"></i></a>

                                                                {!! Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['usuarios.destroy', $usuarios->id],
                                                                    'style' => 'display:inline',
                                                                ]) !!}
                                                                {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endcan
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        {{-- ----------------------------------------------------------------------------- --}}
                                        @can('corporativo')
                                            @foreach ($usuario as $usuarios)
                                                @if ($usuarios->rol == 'Camarista' ||
                                                    $usuarios->rol == 'Supervisor' ||
                                                    $usuarios->rol == 'Gerente' ||
                                                    $usuarios->rol == 'Corporativo')
                                                    <tr>
                                                        <td style="display: none;">{{ $usuarios->id }}</td>
                                                        <td>{{ $usuarios->name }}</td>
                                                        <td>{{ $usuarios->email }}</td>
                                                        <td>{{ $usuarios->hotel }}</td>
                                                        <td>
                                                            @if (!empty($usuarios->getRoleNames()))
                                                                @foreach ($usuarios->getRoleNames() as $rolNombre)
                                                                    <h5><span class="badge badge-dark">{{ $rolNombre }}</span>
                                                                    </h5>
                                                                @endforeach
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-info"
                                                                    href="{{ route('usuarios.edit', $usuarios->id) }}">
                                                                    <i class="fas fa-edit"></i></a>

                                                                {!! Form::open([
                                                                    'method' => 'DELETE',
                                                                    'route' => ['usuarios.destroy', $usuarios->id],
                                                                    'style' => 'display:inline',
                                                                ]) !!}
                                                                {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endcan
                                        {{-- ----------------------------------------------------------------------------- --}}
                                    @endcan
                                    {{-- ----------------------------------------------------------------------------- --}}
                                </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $usuario->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
