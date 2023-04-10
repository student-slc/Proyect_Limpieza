@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">IMAGENES</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">IMAGEN</th>
                              </thead>
                              <tbody>
                            @foreach ($limpieza as $limpiezas)
                            <tr>
                                <td style="display: none;">{{ $limpiezas->id }}</td>
                                <td>

                                    <img src="{{ asset($limpiezas->rejunteLimpioFoto)}}" alt="Imagen" class="img-fluid img-thumbnail" width="100px">

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
