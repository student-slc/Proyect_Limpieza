@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cuestionario</h3>
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
                            {{-- <a class="btn btn-warning" href="{{ route('cuestionario.create') }}">Ver imagenes</a> --}}
                            <form action="{{ route('cuestionario.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h5>{{ $hotel }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" hidden>
                                            <label for="hotel">Hotel</label>
                                            <input type="text" name="hotel" class="form-control"
                                                value="{{ $hotel }}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="cuarto">Cuarto</label>
                                            <input type="text" name="cuarto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="camarista">Camarista</label>
                                            <select name="camarista" id="camarista" class=" selectsearch">
                                                <option disabled selected value="">Selecciona camarista</option>
                                                @foreach ($camarista as $camaristas)
                                                    @if ($camaristas->status == 'Activo')
                                                        <option value="{{ $camaristas->camarista }}">
                                                            {{ $camaristas->camarista }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" hidden>
                                            <label for="responsable">Responsable</label>
                                            <input type="text" name="responsable" class="form-control"
                                                value="{{ $name }}">
                                        </div>
                                    </div>
                                    {{-- ============================================================================= //BUG: 1 ============================================================================= --}}
                                    <label for="status" class="form-check-label">1.- Puerta limpia,mirilla,ruta de
                                        escape</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="puertaLimpia"
                                                id="Pregunta_11" value="Si">
                                            <label class="form-check-label" for="Pregunta_11">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="puertaLimpia"
                                                id="Pregunta_12" value="No">
                                            <label class="form-check-label" for="Pregunta_12">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form no_mostrar" id="p1">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="puertaLimpiaFoto" type="file" id="puertaLimpiaFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="puertaLimpiaFoto" id="puertaLimpiaFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="" width="100px">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="puertaLimpiaFoto2" type="file" id="puertaLimpiaFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="puertaLimpiaFoto2" id="puertaLimpiaFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="" width="100px">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>







                                    {{-- ============================================================================= //BUG: 2 ============================================================================= --}}
                                    <label for="status" class="form-check-label">2.- Paredes y techos limpios y sin
                                        rayas.rejillas
                                        e interuptores limpios</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paredTechoLimpio"
                                                id="Pregunta_21" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_21">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="paredTechoLimpio"
                                                id="Pregunta_22" value="No">
                                            <label class="form-check-label" for="Pregunta_22">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form no_mostrar" id="p2">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="paredTechoLimpioFoto" type="file"
                                                    id="paredTechoLimpioFoto" accept="image/*" capture="camera">
                                                <label for="paredTechoLimpioFoto" id="paredTechoLimpioFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="paredTechoLimpioFoto2" type="file"
                                                    id="paredTechoLimpioFoto2" accept="image/*" capture="camera">
                                                <label for="paredTechoLimpioFoto2" id="paredTechoLimpioFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>


                                    {{-- ============================================================================= //BUG: 3 ============================================================================= --}}
                                    <label for="status" class="form-check-label">3.- Piso Limpios</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisoLimpio"
                                                id="Pregunta_31"value="Si">
                                            <label class="form-check-label" for="Pregunta_31">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisoLimpio"
                                                id="Pregunta_32" value="No">
                                            <label class="form-check-label" for="Pregunta_32">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form no_mostrar" id="p3">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="pisoLimpioFoto" type="file" id="pisoLimpioFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="pisoLimpioFoto" id="pisoLimpioFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="pisoLimpioFoto2" type="file" id="pisoLimpioFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="pisoLimpioFoto2" id="pisoLimpioFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    {{-- ============================================================================= //BUG: 4 ============================================================================= --}}
                                    <label for="status" class="form-check-label">4.- Espejo Limpio</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="espejoLimpio"
                                                id="Pregunta_41" value="Si">
                                            <label class="form-check-label" for="Pregunta_41">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="espejoLimpio"
                                                id="Pregunta_42" value="No">
                                            <label class="form-check-label" for="Pregunta_42">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form no_mostrar" id="p4">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="espejoLimpioFoto" type="file" id="espejoLimpioFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="espejoLimpioFoto" id="espejoLimpioFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="espejoLimpioFoto2" type="file" id="espejoLimpioFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="espejoLimpioFoto2" id="espejoLimpioFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>



                                    {{-- ============================================================================= //BUG: 5 ============================================================================= --}}

                                    <label for="status" class="form-check-label">5.-
                                        Tv,Muebles(Banca,silla,escritorio,armario c/
                                        5 colgadores + 1 c/ 2 presillas)sin polvo o suciedad</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tvMueblesSinPolvo"
                                                id="Pregunta_51" value="Si">
                                            <label class="form-check-label" for="Pregunta_51">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tvMueblesSinPolvo"
                                                id="Pregunta_52" value="No">
                                            <label class="form-check-label" for="Pregunta_52">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p5">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="tvMueblesSinPolvoFoto" type="file"
                                                    id="tvMueblesSinPolvoFoto" accept="image/*" capture="camera">
                                                <label for="tvMueblesSinPolvoFoto" id="tvMueblesSinPolvoFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="tvMueblesSinPolvoFoto2" type="file"
                                                    id="tvMueblesSinPolvoFoto2" accept="image/*" capture="camera">
                                                <label for="tvMueblesSinPolvoFoto2" id="tvMueblesSinPolvoFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 6 ============================================================================= --}}

                                    <label for="status" class="form-check-label">6.- Funcionamiento tv,control
                                        remoto,termostato(clima),telefono</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FuncionamientoTV"
                                                id="Pregunta_61" value="Si">
                                            <label class="form-check-label" for="Pregunta_61">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="FuncionamientoTV"
                                                id="Pregunta_62" value="No">
                                            <label class="form-check-label" for="Pregunta_62">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p6">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="funcionamientoTVFoto" type="file"
                                                    id="funcionamientoTVFoto" accept="image/*" capture="camera">
                                                <label for="funcionamientoTVFoto" id="funcionamientoTVFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="funcionamientoTVFoto2" type="file"
                                                    id="funcionamientoTVFoto2" accept="image/*" capture="camera">
                                                <label for="funcionamientoTVFoto2" id="funcionamientoTVFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>


                                    {{-- ============================================================================= //BUG: 7 ============================================================================= --}}
                                    <label for="status" class="form-check-label">7.- Cortinas limpias,ningun gancho o
                                        panel
                                        suelto,sin hoyos o descocidos,limpieza de vvalue="Si"entana</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cortinasLimpias"
                                                id="Pregunta_71" value="Si">
                                            <label class="form-check-label" for="Pregunta_71">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cortinasLimpias"
                                                id="Pregunta_72" value="No">
                                            <label class="form-check-label" for="Pregunta_72">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form no_mostrar" id="p7">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="cortinasLimpiasFoto" type="file" id="cortinasLimpiasFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="cortinasLimpiasFoto" id="cortinasLimpiasFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="cortinasLimpiasFoto2" type="file"
                                                    id="cortinasLimpiasFoto2" accept="image/*" capture="camera">
                                                <label for="cortinasLimpiasFoto2" id="cortinasLimpiasFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 8 ============================================================================= --}}
                                    <label for="status" class="form-check-label">8.- Iluminacion sin polvo y
                                        funcionando</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="iluminacionSinPol"
                                                id="Pregunta_81" value="Si">
                                            <label class="form-check-label" for="Pregunta_81">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="iluminacionSinPol"
                                                id="Pregunta_82" value="No">
                                            <label class="form-check-label" for="Pregunta_82">
                                                No
                                            </label>
                                        </div>
                                    </div>


                                    <div class="form no_mostrar" id="p8">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="iluminacionSinPolFoto" type="file"
                                                    id="iluminacionSinPolFoto" accept="image/*" capture="camera">
                                                <label for="iluminacionSinPolFoto" id="iluminacionSinPolFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="iluminacionSinPolFoto2" type="file"
                                                    id="iluminacionSinPolFoto2" accept="image/*" capture="camera">
                                                <label for="iluminacionSinPolFoto2" id="iluminacionSinPolFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 9 ============================================================================= --}}

                                    <label for="status" class="form-check-label">9.- Cama:blancos limpios y bien
                                        tendidos(duvet/cubre cvalue="Si"ama)</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="camaBlancosLimpio"
                                                id="Pregunta_91" value="Si">
                                            <label class="form-check-label" for="Pregunta_91">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="camaBlancosLimpio"
                                                id="Pregunta_92" value="No">
                                            <label class="form-check-label" for="Pregunta_92">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p9">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="camaBlancosLimpioFoto" type="file"
                                                    id="camaBlancosLimpioFoto" accept="image/*" capture="camera">
                                                <label for="camaBlancosLimpioFoto" id="camaBlancosLimpioFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="camaBlancosLimpioFoto2" type="file"
                                                    id="camaBlancosLimpioFoto2" accept="image/*" capture="camera">
                                                <label for="camaBlancosLimpioFoto2" id="camaBlancosLimpioFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 10 ============================================================================= --}}

                                    <label for="status" class="form-check-label">10.- "No molestar",bolsa y lista de
                                        lavanderia</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bolsaListaLavande"
                                                id="Pregunta_101" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_101">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bolsaListaLavande"
                                                id="Pregunta_102" value="No">
                                            <label class="form-check-label" for="Pregunta_102">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form no_mostrar" id="p10">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="bolsaListaLavandeFoto" type="file"
                                                    id="bolsaListaLavandeFoto" accept="image/*" capture="camera">
                                                <label for="bolsaListaLavandeFoto" id="bolsaListaLavandeFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="bolsaListaLavandeFoto2" type="file"
                                                    id="bolsaListaLavandeFoto2" accept="image/*" capture="camera">
                                                <label for="bolsaListaLavandeFoto2" id="bolsaListaLavandeFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 11 ============================================================================= --}}

                                    <label for="status" class="form-check-label">11.- Indicacion de voltaje(habitacion y
                                        baño)</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="indicadorVoltaje"
                                                id="Pregunta_111" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_111">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="indicadorVoltaje"
                                                id="Pregunta_112" value="No">
                                            <label class="form-check-label" for="Pregunta_112">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form no_mostrar" id="p11">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="indicadorVoltajeFoto" type="file"
                                                    id="indicadorVoltajeFoto" accept="image/*" capture="camera">
                                                <label for="indicadorVoltajeFoto" id="indicadorVoltajeFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="indicadorVoltajeFoto2" type="file"
                                                    id="indicadorVoltajeFoto2" accept="image/*" capture="camera">
                                                <label for="indicadorVoltajeFoto2" id="indicadorVoltajeFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 12 ============================================================================= --}}

                                    <label for="status" class="form-check-label">12.- 1 jabon, 1 shampoo , 2 papeles
                                        sanitarios</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dispensadorPapel"
                                                id="Pregunta_121" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_121">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dispensadorPapel"
                                                id="Pregunta_122" value="No">
                                            <label class="form-check-label" for="Pregunta_122">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p12">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="dispensadorPapelFoto" type="file"
                                                    id="dispensadorPapelFoto" accept="image/*" capture="camera">
                                                <label for="dispensadorPapelFoto" id="dispensadorPapelFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="dispensadorPapelFoto2" type="file"
                                                    id="dispensadorPapelFoto2" accept="image/*" capture="camera">
                                                <label for="dispensadorPapelFoto2" id="dispensadorPapelFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 13 ============================================================================= --}}
                                    <label for="status" class="form-check-label">13.- Lavabos y grifos limpios y
                                        secos.presencia
                                        tapa WC y funcionamiento secadora,porta papel,toallero</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lavaboGrifos"
                                                id="Pregunta_131" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_131">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lavaboGrifos"
                                                id="Pregunta_132" value="No">
                                            <label class="form-check-label" for="Pregunta_132">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p13">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="lavaboGrifosFoto" type="file" id="lavaboGrifosFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="lavaboGrifosFoto" id="lavaboGrifosFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="lavaboGrifosFoto2" type="file" id="lavaboGrifosFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="lavaboGrifosFoto2" id="lavaboGrifosFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 14 ============================================================================= --}}

                                    <label for="status" class="form-check-label">14.- Espejo,iluminacion,pared,piso y
                                        rejilla de
                                        extraccion limpios.plafones limpios</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="plafonesLimpios"
                                                id="Pregunta_141" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_141">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="plafonesLimpios"
                                                id="Pregunta_142" value="No">
                                            <label class="form-check-label" for="Pregunta_142">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p14">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="plafonesLimpiosFoto" type="file" id="plafonesLimpiosFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="plafonesLimpiosFoto" id="plafonesLimpiosFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="plafonesLimpiosFoto2" type="file"
                                                    id="plafonesLimpiosFoto2" accept="image/*" capture="camera">
                                                <label for="plafonesLimpiosFoto2" id="plafonesLimpiosFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>

                                    {{-- ============================================================================= //BUG: 15 ============================================================================= --}}

                                    <label for="status" class="form-check-label">15.- 2 toallas de baño,1 toalla tapete
                                        sin
                                        manchas u hoyos</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="toallasSinManchas"
                                                id="Pregunta_151" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_151">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="toallasSinManchas"
                                                id="Pregunta_152" value="No">
                                            <label class="form-check-label" for="Pregunta_152">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p15">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="toallasSinManchasFoto" type="file"
                                                    id="toallasSinManchasFoto" accept="image/*" capture="camera">
                                                <label for="toallasSinManchasFoto" id="toallasSinManchasFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="toallasSinManchasFoto2" type="file"
                                                    id="toallasSinManchasFoto2" accept="image/*" capture="camera">
                                                <label for="toallasSinManchasFoto2" id="toallasSinManchasFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 16 ============================================================================= --}}

                                    <label for="status" class="form-check-label">16.- WC limpio y seco sin
                                        fugas.regadera sin
                                        fuga</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="wcLimpio"
                                                id="Pregunta_161" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_161">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="wcLimpio"
                                                id="Pregunta_162" value="No">
                                            <label class="form-check-label" for="Pregunta_162">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p16">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="wcLimpioFoto" type="file" id="wcLimpioFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="wcLimpioFoto" id="wcLimpioFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="wcLimpioFoto2" type="file" id="wcLimpioFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="wcLimpioFoto2" id="wcLimpioFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 17 ============================================================================= --}}

                                    <label for="status" class="form-check-label">17.- Puerta de
                                        cristal,azulejos,jabonera y
                                        alcantarilla limpios y secos</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="puertaCristal"
                                                id="Pregunta_171" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_171">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="puertaCristal"
                                                id="Pregunta_172" value="No">
                                            <label class="form-check-label" for="Pregunta_172">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form no_mostrar" id="p17">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="puertaCristalFoto" type="file" id="puertaCristalFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="puertaCristalFoto" id="puertaCristalFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="puertaCristalFoto2" type="file" id="puertaCristalFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="puertaCristalFoto2" id="puertaCristalFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: 18 ============================================================================= --}}

                                    <label for="status" class="form-check-label">18.- Rejunte limpio y sin moho</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rejunteLimpio"
                                                id="Pregunta_181" value="Si"{{-- checked --}}>
                                            <label class="form-check-label" for="Pregunta_181">
                                                Si
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rejunteLimpio"
                                                id="Pregunta_182" value="No">
                                            <label class="form-check-label" for="Pregunta_182">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form no_mostrar" id="p18">
                                        <div class="grid">
                                            <div class="form-element">
                                                <input name="rejunteLimpioFoto" type="file" id="rejunteLimpioFoto"
                                                    accept="image/*" capture="camera">
                                                <label for="rejunteLimpioFoto" id="rejunteLimpioFoto-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                            {{-- </div>
                                        <div class="grid"> --}}
                                            <div class="form-element">
                                                <input name="rejunteLimpioFoto2" type="file" id="rejunteLimpioFoto2"
                                                    accept="image/*" capture="camera">
                                                <label for="rejunteLimpioFoto2" id="rejunteLimpioFoto2-preview">
                                                    <img src="https://bit.ly/3ubuq5o" alt="">
                                                    <div>
                                                        <span>+</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    {{-- ============================================================================= //BUG: COMENTARIOS ============================================================================= --}}

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="camarista">20.- Comentarios</label>
                                            <textarea type="text" name="comentario" class="form-control"></textarea>
                                        </div>
                                    </div>
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
@section('scripts')
    <script>
        //----------------------------------------- PREGUNTA_1 -----------------------------------------
        var emailInput1 = document.getElementById('p1');
        document.getElementById('Pregunta_11').addEventListener('click', function(e) {
            emailInput1.style.display = 'none';
        });
        document.getElementById('Pregunta_12').addEventListener('click', function(e) {
            emailInput1.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_2 -----------------------------------------
        var emailInput2 = document.getElementById('p2');
        document.getElementById('Pregunta_21').addEventListener('click', function(e) {
            emailInput2.style.display = 'none';
        });
        document.getElementById('Pregunta_22').addEventListener('click', function(e) {
            emailInput2.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_3 -----------------------------------------
        var emailInput3 = document.getElementById('p3');
        document.getElementById('Pregunta_31').addEventListener('click', function(e) {
            emailInput3.style.display = 'none';
        });
        document.getElementById('Pregunta_32').addEventListener('click', function(e) {
            emailInput3.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_4 -----------------------------------------
        var emailInput4 = document.getElementById('p4');
        document.getElementById('Pregunta_41').addEventListener('click', function(e) {
            emailInput4.style.display = 'none';
        });
        document.getElementById('Pregunta_42').addEventListener('click', function(e) {
            emailInput4.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_5 -----------------------------------------
        var emailInput5 = document.getElementById('p5');
        document.getElementById('Pregunta_51').addEventListener('click', function(e) {
            emailInput5.style.display = 'none';
        });
        document.getElementById('Pregunta_52').addEventListener('click', function(e) {
            emailInput5.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_6 -----------------------------------------
        var emailInput6 = document.getElementById('p6');
        document.getElementById('Pregunta_61').addEventListener('click', function(e) {
            emailInput6.style.display = 'none';
        });
        document.getElementById('Pregunta_62').addEventListener('click', function(e) {
            emailInput6.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_7 -----------------------------------------
        var emailInput7 = document.getElementById('p7');
        document.getElementById('Pregunta_71').addEventListener('click', function(e) {
            emailInput7.style.display = 'none';
        });
        document.getElementById('Pregunta_72').addEventListener('click', function(e) {
            emailInput7.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_8 -----------------------------------------
        var emailInput8 = document.getElementById('p8');
        document.getElementById('Pregunta_81').addEventListener('click', function(e) {
            emailInput8.style.display = 'none';
        });
        document.getElementById('Pregunta_82').addEventListener('click', function(e) {
            emailInput8.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_9 -----------------------------------------
        var emailInput9 = document.getElementById('p9');
        document.getElementById('Pregunta_91').addEventListener('click', function(e) {
            emailInput9.style.display = 'none';
        });
        document.getElementById('Pregunta_92').addEventListener('click', function(e) {
            emailInput9.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_10 -----------------------------------------
        var emailInput10 = document.getElementById('p10');
        document.getElementById('Pregunta_101').addEventListener('click', function(e) {
            emailInput10.style.display = 'none';
        });
        document.getElementById('Pregunta_102').addEventListener('click', function(e) {
            emailInput10.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_11 -----------------------------------------
        var emailInput11 = document.getElementById('p11');
        document.getElementById('Pregunta_111').addEventListener('click', function(e) {
            emailInput11.style.display = 'none';
        });
        document.getElementById('Pregunta_112').addEventListener('click', function(e) {
            emailInput11.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_12 -----------------------------------------
        var emailInput12 = document.getElementById('p12');
        document.getElementById('Pregunta_121').addEventListener('click', function(e) {
            emailInput12.style.display = 'none';
        });
        document.getElementById('Pregunta_122').addEventListener('click', function(e) {
            emailInput12.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_13 -----------------------------------------
        var emailInput13 = document.getElementById('p13');
        document.getElementById('Pregunta_131').addEventListener('click', function(e) {
            emailInput13.style.display = 'none';
        });
        document.getElementById('Pregunta_132').addEventListener('click', function(e) {
            emailInput13.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_14 -----------------------------------------
        var emailInput14 = document.getElementById('p14');
        document.getElementById('Pregunta_141').addEventListener('click', function(e) {
            emailInput14.style.display = 'none';
        });
        document.getElementById('Pregunta_142').addEventListener('click', function(e) {
            emailInput14.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_15 -----------------------------------------
        var emailInput15 = document.getElementById('p15');
        document.getElementById('Pregunta_151').addEventListener('click', function(e) {
            emailInput15.style.display = 'none';
        });
        document.getElementById('Pregunta_152').addEventListener('click', function(e) {
            emailInput15.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_16 -----------------------------------------
        var emailInput16 = document.getElementById('p16');
        document.getElementById('Pregunta_161').addEventListener('click', function(e) {
            emailInput16.style.display = 'none';
        });
        document.getElementById('Pregunta_162').addEventListener('click', function(e) {
            emailInput16.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_17 -----------------------------------------
        var emailInput17 = document.getElementById('p17');
        document.getElementById('Pregunta_171').addEventListener('click', function(e) {
            emailInput17.style.display = 'none';
        });
        document.getElementById('Pregunta_172').addEventListener('click', function(e) {
            emailInput17.style.display = 'inline';
        });
        //----------------------------------------- PREGUNTA_18 -----------------------------------------
        var emailInput18 = document.getElementById('p18');
        document.getElementById('Pregunta_181').addEventListener('click', function(e) {
            emailInput18.style.display = 'none';
        });
        document.getElementById('Pregunta_182').addEventListener('click', function(e) {
            emailInput18.style.display = 'inline';
        });
        //================================================ //BUG: IMAGE PREVIEW ========================================
        function previewBeforeUpload(id) {
            document.querySelector("#" + id).addEventListener("change", function(e) {
                if (e.target.files.length == 0) {
                    return;
                }
                let file = e.target.files[0];
                let url = URL.createObjectURL(file);
                document.querySelector("#" + id + "-preview div").innerText = file.name;
                document.querySelector("#" + id + "-preview img").src = url;
            });
        }
        previewBeforeUpload("puertaLimpiaFoto");
        previewBeforeUpload("puertaLimpiaFoto2");

        previewBeforeUpload("paredTechoLimpioFoto");
        previewBeforeUpload("paredTechoLimpioFoto2");

        previewBeforeUpload("pisoLimpioFoto");
        previewBeforeUpload("pisoLimpioFoto2");

        previewBeforeUpload("espejoLimpioFoto");
        previewBeforeUpload("espejoLimpioFoto2");

        previewBeforeUpload("tvMueblesSinPolvoFoto");
        previewBeforeUpload("tvMueblesSinPolvoFoto2");

        previewBeforeUpload("funcionamientoTVFoto");
        previewBeforeUpload("funcionamientoTVFoto2");

        previewBeforeUpload("cortinasLimpiasFoto");
        previewBeforeUpload("cortinasLimpiasFoto2");

        previewBeforeUpload("iluminacionSinPolFoto");
        previewBeforeUpload("iluminacionSinPolFoto2");

        previewBeforeUpload("camaBlancosLimpioFoto");
        previewBeforeUpload("camaBlancosLimpioFoto2");

        previewBeforeUpload("bolsaListaLavandeFoto");
        previewBeforeUpload("bolsaListaLavandeFoto2");

        previewBeforeUpload("indicadorVoltajeFoto");
        previewBeforeUpload("indicadorVoltajeFoto2");

        previewBeforeUpload("dispensadorPapelFoto");
        previewBeforeUpload("dispensadorPapelFoto2");

        previewBeforeUpload("lavaboGrifosFoto");
        previewBeforeUpload("lavaboGrifosFoto2");

        previewBeforeUpload("plafonesLimpiosFoto");
        previewBeforeUpload("plafonesLimpiosFoto2");

        previewBeforeUpload("toallasSinManchasFoto");
        previewBeforeUpload("toallasSinManchasFoto2");

        previewBeforeUpload("wcLimpioFoto");
        previewBeforeUpload("wcLimpioFoto2");

        previewBeforeUpload("puertaCristalFoto");
        previewBeforeUpload("puertaCristalFoto2");

        previewBeforeUpload("rejunteLimpioFoto");
        previewBeforeUpload("rejunteLimpioFoto2");
    </script>
@endsection
