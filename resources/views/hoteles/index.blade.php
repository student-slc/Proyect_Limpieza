@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">{{ $nombre }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-hoteles')
                        <a class="btn btn-warning" href="{{ route('hoteles.create',$nombre) }}">Agregar Hotel</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#00C0F5">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre Hotel</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($hoteles as $hotele)
                            <tr>
                                <td style="display: none;">{{ $hotele->id }}</td>
                                <td>{{ $hotele->nombre_hotel }}</td>
                                <td>
                                    <form action="{{ route('hoteles.destroy',$hotele->id) }}" method="POST">
                                        @can('editar-hoteles')
                                        <a class="btn btn-info" href="{{ route('hoteles.edit',$hotele->id) }}">
                                            <i class="fas fa-edit"></i></a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-hoteles')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $hoteles->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
