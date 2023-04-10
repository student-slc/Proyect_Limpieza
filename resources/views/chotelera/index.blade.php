@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cadena Hotelera</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-CadenaHotelera')
                        <a class="btn btn-warning" href="{{ route('cadenahotelera.create') }}">Agregar Cadena Hotelera</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#00C0F5">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Cadena Hotelera</th>
                                    <th style="color:#fff;">Sucursales</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($cadenahoteleras as $cadenahotelera)
                            <tr>
                                <td style="display: none;">{{ $cadenahotelera->id }}</td>
                                <td>{{ $cadenahotelera->nombre_hotelera }}</td>
                                <td>
                                    @can('ver-hoteles')
                                    <a class="btn btn-dark" href="{{ route('hoteles.show',$nombre= $cadenahotelera->nombre_hotelera) }}">
                                        <i class="fas fa-hotel"></i></a>
                                    @endcan
                                </td>
                                <td>
                                    <form action="{{ route('cadenahotelera.destroy',$cadenahotelera->id) }}" method="POST">
                                        @can('editar-CadenaHotelera')
                                        <a class="btn btn-info" href="{{ route('cadenahotelera.edit',$cadenahotelera->id) }}">
                                            <i class="fas fa-edit"></i></a>
                                        @endcan
                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-CadenaHotelera')
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
                            {!! $cadenahoteleras->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
