@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Camaristas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-camarista')
                                <a class="btn btn-warning" href="{{ route('camaristas.create') }}">Agregar Camarista</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#00C0F5">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Hotel</th>
                                    <th style="color:#fff;">Camarista</th>
                                    <th style="color:#fff;">Status</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @can('por_hotel')
                                        @foreach ($camarista as $camaristas)
                                            <tr>
                                                <td style="display: none;">{{ $camaristas->id }}</td>
                                                <td>{{ $camaristas->hotel }}</td>
                                                <td>{{ $camaristas->camarista }}</td>
                                                <td>{{ $camaristas->status }}</td>
                                                <td>
                                                    <form action="{{ route('camaristas.destroy', $camaristas->id) }}"
                                                        method="POST">
                                                        @can('editar-camarista')
                                                            <a class="btn btn-info"
                                                                href="{{ route('camaristas.edit', $camaristas->id) }}">
                                                                <i class="fas fa-edit"></i></a></a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-camarista')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endcan
                                    @can('todos_hoteles')
                                        @foreach ($camaristas as $camarista)
                                            <tr>
                                                <td style="display: none;">{{ $camarista->id }}</td>
                                                <td>{{ $camarista->hotel }}</td>
                                                <td>{{ $camarista->camarista }}</td>
                                                <td>{{ $camarista->status }}</td>
                                                <td>
                                                    <form action="{{ route('camaristas.destroy', $camarista->id) }}"
                                                        method="POST">
                                                        @can('editar-camarista')
                                                            <a class="btn btn-info"
                                                                href="{{ route('camaristas.edit', $camarista->id) }}">
                                                                <i class="fas fa-edit"></i></a>
                                                        @endcan

                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-camarista')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endcan
                                </tbody>
                            </table>
                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                @can('todos_hoteles')
                                    {!! $camaristas->links() !!}
                                @endcan
                                @can('por_hotel')
                                    {!! $camarista->links() !!}
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
