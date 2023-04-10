@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Camarista</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <form action="{{ route('camaristas.update', $camarista->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    @can('por_hotel')
                                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                                            <div class="form-group">
                                                <label for="hotel">Hotel</label>
                                                <input type="text" name="hotel" class="form-control"
                                                    value="{{ $camarista->hotel }}">
                                            </div>
                                        </div>
                                    @endcan
                                    @can('todos_hoteles')
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="hotel">Hotel</label>
                                                <select name="hotel" class="selectsearch">
                                                    @foreach ($hotele as $hoteles)
                                                        @if ($camarista->hotel == $hoteles->nombre_hotel)
                                                            <option name="hotel" value="{{ $hoteles->nombre_hotel }}"
                                                                selected>
                                                                {{ $hoteles->nombre_hotel }}</option>
                                                        @else
                                                            <option name="hotel" value="{{ $hoteles->nombre_hotel }}">
                                                                {{ $hoteles->nombre_hotel }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endcan

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="camarista">Camarista</label>
                                            <input type="text" name="camarista" class="form-control"
                                                value="{{ $camarista->camarista }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="selectsearch">
                                                <option disabled selected value="">Selecciona Status</option>
                                                <option name="status" value="Activo">Activo</option>
                                                <option name="status" value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-info">Guardar</button>
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
