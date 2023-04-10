<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Limpieza;
use App\Models\Camarista;



class CuestionarioController extends Controller
{
    /* function __construct()
    {
        $this->middleware('permission:ver-cuestionario|crear-cuestionario|editar-cuestionario|borrar-cuestionario')->only('index');
        $this->middleware('permission:crear-cuestionario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cuestionario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cuestionario', ['only' => ['destroy']]);
    } */
    public function index()
    {
        $usuario = \Auth::user();
        $hotel = $usuario->hotel;
        $name = $usuario->name;

        $rol = $usuario-> rol;
        if($rol=='SuperAdministrador'){
            $camarista=Camarista::all();
        }else{
            $camarista=Camarista::where('hotel','=',$hotel)->get();
        }


        return view('cuestionario.index', compact('hotel','camarista','name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $limpieza = Limpieza::all();
        return view('cuestionario.show', compact('limpieza'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pregunta_p11='sin evidencia';
        $pregunta_p12='sin evidencia';
        $pregunta_p21='sin evidencia';
        $pregunta_p22='sin evidencia';
        $pregunta_p31='sin evidencia';
        $pregunta_p32='sin evidencia';
        $pregunta_p41='sin evidencia';
        $pregunta_p42='sin evidencia';
        $pregunta_p51='sin evidencia';
        $pregunta_p52='sin evidencia';
        $pregunta_p61='sin evidencia';
        $pregunta_p62='sin evidencia';
        $pregunta_p71='sin evidencia';
        $pregunta_p72='sin evidencia';
        $pregunta_p81='sin evidencia';
        $pregunta_p82='sin evidencia';
        $pregunta_p91='sin evidencia';
        $pregunta_p92='sin evidencia';
        $pregunta_p101='sin evidencia';
        $pregunta_p102='sin evidencia';
        $pregunta_p111='sin evidencia';
        $pregunta_p112='sin evidencia';
        $pregunta_p121='sin evidencia';
        $pregunta_p122='sin evidencia';
        $pregunta_p131='sin evidencia';
        $pregunta_p132='sin evidencia';
        $pregunta_p141='sin evidencia';
        $pregunta_p142='sin evidencia';
        $pregunta_p151='sin evidencia';
        $pregunta_p152='sin evidencia';
        $pregunta_p161='sin evidencia';
        $pregunta_p162='sin evidencia';
        $pregunta_p171='sin evidencia';
        $pregunta_p172='sin evidencia';
        $pregunta_p181='sin evidencia';
        $pregunta_p182='sin evidencia';
        request()->validate([
            'hotel' => 'required',
            'cuarto' => 'required',
            'camarista' => 'required',
            'responsable' => 'required',
            'puertaLimpia' => 'required',
            'paredTechoLimpio' => 'required',
            'pisoLimpio' => 'required',
            'espejoLimpio' => 'required',
            'tvMueblesSinPolvo' => 'required',
            'FuncionamientoTV' => 'required',
            'cortinasLimpias' => 'required',
            'iluminacionSinPol' => 'required',
            'camaBlancosLimpio' => 'required',
            'bolsaListaLavande' => 'required',
            'indicadorVoltaje' => 'required',
            'dispensadorPapel' => 'required',
            'lavaboGrifos' => 'required',
            'plafonesLimpios' => 'required',
            'toallasSinManchas' => 'required',
            'wcLimpio' => 'required',
            'puertaCristal' => 'required',
            'rejunteLimpio' => 'required',
            'comentario' => 'required',
        ]);
        $ruta = "img/evidencia";
        if (is_dir($ruta)) {
        } else {
            $ruta = "img/evidencia";
            \File::makeDirectory($ruta, 0775, true);
        }
        //------------------------------------------------ EVIDENCIA_PREGUNTA_1 ------------------------------------------------
        if ($request->hasfile('puertaLimpiaFoto') || $request->hasfile('puertaLimpiaFoto2')) {
            $file_p11 = $request->file('puertaLimpiaFoto');
            $destino_p11 = 'img/evidencia/';
            $filename_p11 = 'p_11'.time() . '-' . $file_p11->getClientOriginalName();
            $cargar_p11 = $request->file('puertaLimpiaFoto')->move($destino_p11, $filename_p11);
            $pregunta_p11 = $destino_p11 . $filename_p11;

            $file_p12 = $request->file('puertaLimpiaFoto2');
            $destino_p12 = 'img/evidencia/';
            $filename_p12 = 'p_12'.time() . '-' . $file_p12->getClientOriginalName();
            $cargar_p12 = $request->file('puertaLimpiaFoto2')->move($destino_p12, $filename_p12);
            $pregunta_p12 = $destino_p12 . $filename_p12;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_2 ------------------------------------------------
        if ($request->hasfile('paredTechoLimpioFoto') || $request->hasfile('paredTechoLimpioFoto2')) {
            $file_p21 = $request->file('paredTechoLimpioFoto');
            $destino_p21 = 'img/evidencia/';
            $filename_p21 = 'p_21'.time() . '-' . $file_p21->getClientOriginalName();
            $cargar_p21 = $request->file('paredTechoLimpioFoto')->move($destino_p21, $filename_p21);
            $pregunta_p21 = $destino_p21 . $filename_p21;

            $file_p22 = $request->file('paredTechoLimpioFoto2');
            $destino_p22 = 'img/evidencia/';
            $filename_p22 = 'p_22'.time() . '-' . $file_p22->getClientOriginalName();
            $cargar_p22 = $request->file('paredTechoLimpioFoto2')->move($destino_p22, $filename_p22);
            $pregunta_p22 = $destino_p22 . $filename_p22;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_3 ------------------------------------------------
        if ($request->hasfile('pisoLimpioFoto') || $request->hasfile('pisoLimpioFoto2')) {
            $file_p31 = $request->file('pisoLimpioFoto');
            $destino_p31 = 'img/evidencia/';
            $filename_p31 = 'p_31'.time() . '-' . $file_p31->getClientOriginalName();
            $cargar_p31 = $request->file('pisoLimpioFoto')->move($destino_p31, $filename_p31);
            $pregunta_p31 = $destino_p31 . $filename_p31;

            $file_p32 = $request->file('pisoLimpioFoto2');
            $destino_p32 = 'img/evidencia/';
            $filename_p32 = 'p_32'.time() . '-' . $file_p32->getClientOriginalName();
            $cargar_p32 = $request->file('pisoLimpioFoto2')->move($destino_p32, $filename_p32);
            $pregunta_p32 = $destino_p32 . $filename_p32;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_4 ------------------------------------------------
        if ($request->hasfile('espejoLimpioFoto') || $request->hasfile('espejoLimpioFoto2')) {
            $file_p41 = $request->file('espejoLimpioFoto');
            $destino_p41 = 'img/evidencia/';
            $filename_p41 = 'p_41'.time() . '-' . $file_p41->getClientOriginalName();
            $cargar_p41 = $request->file('espejoLimpioFoto')->move($destino_p41, $filename_p41);
            $pregunta_p41 = $destino_p41 . $filename_p41;

            $file_p42 = $request->file('espejoLimpioFoto2');
            $destino_p42 = 'img/evidencia/';
            $filename_p42 = 'p_42'.time() . '-' . $file_p42->getClientOriginalName();
            $cargar_p42 = $request->file('espejoLimpioFoto2')->move($destino_p42, $filename_p42);
            $pregunta_p42 = $destino_p42 . $filename_p42;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_5 ------------------------------------------------
        if ($request->hasfile('tvMueblesSinPolvoFoto') || $request->hasfile('tvMueblesSinPolvoFoto2')) {
            $file_p51 = $request->file('tvMueblesSinPolvoFoto');
            $destino_p51 = 'img/evidencia/';
            $filename_p51 = 'p_51'.time() . '-' . $file_p51->getClientOriginalName();
            $cargar_p51 = $request->file('tvMueblesSinPolvoFoto')->move($destino_p51, $filename_p51);
            $pregunta_p51 = $destino_p51 . $filename_p51;

            $file_p52 = $request->file('tvMueblesSinPolvoFoto2');
            $destino_p52 = 'img/evidencia/';
            $filename_p52 = 'p_52'.time() . '-' . $file_p52->getClientOriginalName();
            $cargar_p52 = $request->file('tvMueblesSinPolvoFoto2')->move($destino_p52, $filename_p52);
            $pregunta_p52 = $destino_p52 . $filename_p52;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_6 ------------------------------------------------
        if ($request->hasfile('funcionamientoTVFoto') || $request->hasfile('funcionamientoTVFoto2')) {
            $file_p61 = $request->file('funcionamientoTVFoto');
            $destino_p61 = 'img/evidencia/';
            $filename_p61 = 'p_61'.time() . '-' . $file_p61->getClientOriginalName();
            $cargar_p61 = $request->file('funcionamientoTVFoto')->move($destino_p61, $filename_p61);
            $pregunta_p61 = $destino_p61 . $filename_p61;

            $file_p62 = $request->file('funcionamientoTVFoto2');
            $destino_p62 = 'img/evidencia/';
            $filename_p62 = 'p_62'.time() . '-' . $file_p62->getClientOriginalName();
            $cargar_p62 = $request->file('funcionamientoTVFoto2')->move($destino_p62, $filename_p62);
            $pregunta_p62 = $destino_p62 . $filename_p62;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_7 ------------------------------------------------
        if ($request->hasfile('cortinasLimpiasFoto') || $request->hasfile('cortinasLimpiasFoto2')) {
            $file_p71 = $request->file('cortinasLimpiasFoto');
            $destino_p71 = 'img/evidencia/';
            $filename_p71 = 'p_71'.time() . '-' . $file_p71->getClientOriginalName();
            $cargar_p71 = $request->file('cortinasLimpiasFoto')->move($destino_p71, $filename_p71);
            $pregunta_p71 = $destino_p71 . $filename_p71;

            $file_p72 = $request->file('cortinasLimpiasFoto2');
            $destino_p72 = 'img/evidencia/';
            $filename_p72 = 'p_72'.time() . '-' . $file_p72->getClientOriginalName();
            $cargar_p72 = $request->file('cortinasLimpiasFoto2')->move($destino_p72, $filename_p72);
            $pregunta_p72 = $destino_p72 . $filename_p72;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_8 ------------------------------------------------
        if ($request->hasfile('iluminacionSinPolFoto') || $request->hasfile('iluminacionSinPolFoto2')) {
            $file_p81 = $request->file('iluminacionSinPolFoto');
            $destino_p81 = 'img/evidencia/';
            $filename_p81 = 'p_81'.time() . '-' . $file_p81->getClientOriginalName();
            $cargar_p81 = $request->file('iluminacionSinPolFoto')->move($destino_p81, $filename_p81);
            $pregunta_p81 = $destino_p81 . $filename_p81;

            $file_p82 = $request->file('iluminacionSinPolFoto2');
            $destino_p82 = 'img/evidencia/';
            $filename_p82 = 'p_82'.time() . '-' . $file_p82->getClientOriginalName();
            $cargar_p82 = $request->file('iluminacionSinPolFoto2')->move($destino_p82, $filename_p82);
            $pregunta_p82 = $destino_p82 . $filename_p82;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_9 ------------------------------------------------
        if ($request->hasfile('camaBlancosLimpioFoto') || $request->hasfile('camaBlancosLimpioFoto2')) {
            $file_p91 = $request->file('camaBlancosLimpioFoto');
            $destino_p91 = 'img/evidencia/';
            $filename_p91 = 'p_91'.time() . '-' . $file_p91->getClientOriginalName();
            $cargar_p91 = $request->file('camaBlancosLimpioFoto')->move($destino_p91, $filename_p91);
            $pregunta_p91 = $destino_p91 . $filename_p91;

            $file_p92 = $request->file('camaBlancosLimpioFoto2');
            $destino_p92 = 'img/evidencia/';
            $filename_p92 = 'p_92'.time() . '-' . $file_p92->getClientOriginalName();
            $cargar_p92 = $request->file('camaBlancosLimpioFoto2')->move($destino_p92, $filename_p92);
            $pregunta_p92 = $destino_p92 . $filename_p92;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_10 ------------------------------------------------
        if ($request->hasfile('bolsaListaLavandeFoto') || $request->hasfile('bolsaListaLavandeFoto2')) {
            $file_p101 = $request->file('bolsaListaLavandeFoto');
            $destino_p101 = 'img/evidencia/';
            $filename_p101 = 'p_101'.time() . '-' . $file_p101->getClientOriginalName();
            $cargar_p101 = $request->file('bolsaListaLavandeFoto')->move($destino_p101, $filename_p101);
            $pregunta_p101 = $destino_p101 . $filename_p101;

            $file_p102 = $request->file('bolsaListaLavandeFoto2');
            $destino_p102 = 'img/evidencia/';
            $filename_p102 = 'p_102'.time() . '-' . $file_p102->getClientOriginalName();
            $cargar_p102 = $request->file('bolsaListaLavandeFoto2')->move($destino_p102, $filename_p102);
            $pregunta_p102 = $destino_p102 . $filename_p102;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_11 ------------------------------------------------
        if ($request->hasfile('indicadorVoltajeFoto') || $request->hasfile('indicadorVoltajeFoto2')) {
            $file_p111 = $request->file('indicadorVoltajeFoto');
            $destino_p111 = 'img/evidencia/';
            $filename_p111 = 'p_111'.time() . '-' . $file_p111->getClientOriginalName();
            $cargar_p111 = $request->file('indicadorVoltajeFoto')->move($destino_p111, $filename_p111);
            $pregunta_p111 = $destino_p111 . $filename_p111;

            $file_p112 = $request->file('indicadorVoltajeFoto2');
            $destino_p112 = 'img/evidencia/';
            $filename_p112 = 'p_112'.time() . '-' . $file_p112->getClientOriginalName();
            $cargar_p112 = $request->file('indicadorVoltajeFoto2')->move($destino_p112, $filename_p112);
            $pregunta_p112 = $destino_p112 . $filename_p112;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_12 ------------------------------------------------
        if ($request->hasfile('dispensadorPapelFoto') || $request->hasfile('dispensadorPapelFoto2')) {
            $file_p121 = $request->file('dispensadorPapelFoto');
            $destino_p121 = 'img/evidencia/';
            $filename_p121 = 'p_121'.time() . '-' . $file_p121->getClientOriginalName();
            $cargar_p121 = $request->file('dispensadorPapelFoto')->move($destino_p121, $filename_p121);
            $pregunta_p121 = $destino_p121 . $filename_p121;

            $file_p122 = $request->file('dispensadorPapelFoto2');
            $destino_p122 = 'img/evidencia/';
            $filename_p122 = 'p_122'.time() . '-' . $file_p122->getClientOriginalName();
            $cargar_p122 = $request->file('dispensadorPapelFoto2')->move($destino_p122, $filename_p122);
            $pregunta_p122 = $destino_p122 . $filename_p122;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_13 ------------------------------------------------
        if ($request->hasfile('lavaboGrifosFoto') || $request->hasfile('lavaboGrifosFoto2')) {
            $file_p131 = $request->file('lavaboGrifosFoto');
            $destino_p131 = 'img/evidencia/';
            $filename_p131 = 'p_131'.time() . '-' . $file_p131->getClientOriginalName();
            $cargar_p131 = $request->file('lavaboGrifosFoto')->move($destino_p131, $filename_p131);
            $pregunta_p131 = $destino_p131 . $filename_p131;

            $file_p132 = $request->file('lavaboGrifosFoto2');
            $destino_p132 = 'img/evidencia/';
            $filename_p132 = 'p_132'.time() . '-' . $file_p132->getClientOriginalName();
            $cargar_p132 = $request->file('lavaboGrifosFoto2')->move($destino_p132, $filename_p132);
            $pregunta_p132 = $destino_p132 . $filename_p132;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_14 ------------------------------------------------
        if ($request->hasfile('plafonesLimpiosFoto') || $request->hasfile('plafonesLimpiosFoto2')) {
            $file_p141 = $request->file('plafonesLimpiosFoto');
            $destino_p141 = 'img/evidencia/';
            $filename_p141 = 'p_141'.time() . '-' . $file_p141->getClientOriginalName();
            $cargar_p141 = $request->file('plafonesLimpiosFoto')->move($destino_p141, $filename_p141);
            $pregunta_p141 = $destino_p141 . $filename_p141;

            $file_p142 = $request->file('plafonesLimpiosFoto2');
            $destino_p142 = 'img/evidencia/';
            $filename_p142 = 'p_142'.time() . '-' . $file_p142->getClientOriginalName();
            $cargar_p142 = $request->file('plafonesLimpiosFoto2')->move($destino_p142, $filename_p142);
            $pregunta_p142 = $destino_p142 . $filename_p142;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_15 ------------------------------------------------
        if ($request->hasfile('toallasSinManchasFoto') || $request->hasfile('toallasSinManchasFoto2')) {
            $file_p151 = $request->file('toallasSinManchasFoto');
            $destino_p151 = 'img/evidencia/';
            $filename_p151 = 'p_151'.time() . '-' . $file_p151->getClientOriginalName();
            $cargar_p151 = $request->file('toallasSinManchasFoto')->move($destino_p151, $filename_p151);
            $pregunta_p151 = $destino_p151 . $filename_p151;

            $file_p152 = $request->file('toallasSinManchasFoto2');
            $destino_p152 = 'img/evidencia/';
            $filename_p152 = 'p_152'.time() . '-' . $file_p152->getClientOriginalName();
            $cargar_p152 = $request->file('toallasSinManchasFoto2')->move($destino_p152, $filename_p152);
            $pregunta_p152 = $destino_p152 . $filename_p152;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_16 ------------------------------------------------
        if ($request->hasfile('wcLimpioFoto') || $request->hasfile('wcLimpioFoto2')) {
            $file_p161 = $request->file('wcLimpioFoto');
            $destino_p161 = 'img/evidencia/';
            $filename_p161 = 'p_161'.time() . '-' . $file_p161->getClientOriginalName();
            $cargar_p161 = $request->file('wcLimpioFoto')->move($destino_p161, $filename_p161);
            $pregunta_p161 = $destino_p161 . $filename_p161;

            $file_p162 = $request->file('wcLimpioFoto2');
            $destino_p162 = 'img/evidencia/';
            $filename_p162 = 'p_162'.time() . '-' . $file_p162->getClientOriginalName();
            $cargar_p162 = $request->file('wcLimpioFoto2')->move($destino_p162, $filename_p162);
            $pregunta_p162 = $destino_p162 . $filename_p162;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_17 ------------------------------------------------
        if ($request->hasfile('puertaCristalFoto') || $request->hasfile('puertaCristalFoto2')) {
            $file_p171 = $request->file('puertaCristalFoto');
            $destino_p171 = 'img/evidencia/';
            $filename_p171 = 'p_171'.time() . '-' . $file_p171->getClientOriginalName();
            $cargar_p171 = $request->file('puertaCristalFoto')->move($destino_p171, $filename_p171);
            $pregunta_p171 = $destino_p171 . $filename_p171;

            $file_p172 = $request->file('puertaCristalFoto2');
            $destino_p172 = 'img/evidencia/';
            $filename_p172 = 'p_172'.time() . '-' . $file_p172->getClientOriginalName();
            $cargar_p172 = $request->file('puertaCristalFoto2')->move($destino_p172, $filename_p172);
            $pregunta_p172 = $destino_p172 . $filename_p172;
        }
        //----------------------------------------------------------------------------------------------------------------------
        //------------------------------------------------ EVIDENCIA_PREGUNTA_18 ------------------------------------------------
        if ($request->hasfile('rejunteLimpioFoto') || $request->hasfile('rejunteLimpioFoto2')) {
            $file_p181 = $request->file('rejunteLimpioFoto');
            $destino_p181 = 'img/evidencia/';
            $filename_p181 = 'p_181'.time() . '-' . $file_p181->getClientOriginalName();
            $cargar_p181 = $request->file('rejunteLimpioFoto')->move($destino_p181, $filename_p181);
            $pregunta_p181 = $destino_p181 . $filename_p181;

            $file_p182 = $request->file('rejunteLimpioFoto2');
            $destino_p182 = 'img/evidencia/';
            $filename_p182 = 'p_182'.time() . '-' . $file_p182->getClientOriginalName();
            $cargar_p182 = $request->file('rejunteLimpioFoto2')->move($destino_p182, $filename_p182);
            $pregunta_p182 = $destino_p182 . $filename_p182;
        }
        //----------------------------------------------------------------------------------------------------------------------


        Limpieza::create([
            'hotel' => $request['hotel'],
            'responsable' => $request['responsable'],
            'camarista' => $request['camarista'],
            'cuarto' => $request['cuarto'],
            'puertaLimpia' => $request['puertaLimpia'],
            'puertaLimpiaFoto' => $pregunta_p11,
            'puertaLimpiaFoto2' => $pregunta_p12,
            'paredTechoLimpio' => $request['paredTechoLimpio'],
            'paredTechoLimpioFoto' => $pregunta_p21,
            'paredTechoLimpioFoto2' => $pregunta_p22,
            'pisoLimpio' => $request['pisoLimpio'],
            'pisoLimpioFoto' => $pregunta_p31,
            'pisoLimpioFoto2' => $pregunta_p32,
            'espejoLimpio' => $request['espejoLimpio'],
            'espejoLimpioFoto' => $pregunta_p41,
            'espejoLimpioFoto2' => $pregunta_p42,
            'tvMueblesSinPolvo' => $request['tvMueblesSinPolvo'],
            'tvMueblesSinPolvoFoto' => $pregunta_p51,
            'tvMueblesSinPolvoFoto2' => $pregunta_p52,
            'FuncionamientoTV' => $request['FuncionamientoTV'],
            'FuncionamientoTVFoto' => $pregunta_p61,
            'FuncionamientoTVFoto2' => $pregunta_p62,
            'cortinasLimpias' => $request['cortinasLimpias'],
            'cortinasLimpiasFoto' => $pregunta_p71,
            'cortinasLimpiasFoto2' => $pregunta_p72,
            'iluminacionSinPol' => $request['iluminacionSinPol'],
            'iluminacionSinPolFoto' => $pregunta_p81,
            'iluminacionSinPolFoto2' => $pregunta_p82,
            'camaBlancosLimpio' => $request['camaBlancosLimpio'],
            'camaBlancosLimpioFoto' =>  $pregunta_p91,
            'camaBlancosLimpioFoto2' =>  $pregunta_p92,
            'bolsaListaLavande' => $request['bolsaListaLavande'],
            'bolsaListaLavandeFoto' => $pregunta_p101,
            'bolsaListaLavandeFoto2' => $pregunta_p102,
            'indicadorVoltaje' => $request['indicadorVoltaje'],
            'indicadorVoltajeFoto' => $pregunta_p111,
            'indicadorVoltajeFoto2' => $pregunta_p112,
            'dispensadorPapel' => $request['dispensadorPapel'],
            'dispensadorPapelFoto' => $pregunta_p121,
            'dispensadorPapelFoto2' => $pregunta_p122,
            'lavaboGrifos' => $request['lavaboGrifos'],
            'lavaboGrifosFoto' => $pregunta_p131,
            'lavaboGrifosFoto2' => $pregunta_p132,
            'plafonesLimpios' => $request['plafonesLimpios'],
            'plafonesLimpiosFoto' => $pregunta_p141,
            'plafonesLimpiosFoto2' => $pregunta_p142,
            'toallasSinManchas' => $request['toallasSinManchas'],
            'toallasSinManchasFoto' => $pregunta_p151,
            'toallasSinManchasFoto2' => $pregunta_p152,
            'wcLimpio' => $request['wcLimpio'],
            'wcLimpioFoto' => $pregunta_p161,
            'wcLimpioFoto2' => $pregunta_p162,
            'puertaCristal' => $request['puertaCristal'],
            'puertaCristalFoto' => $pregunta_p171,
            'puertaCristalFoto2' => $pregunta_p172,
            'rejunteLimpio' => $request['rejunteLimpio'],
            'rejunteLimpioFoto' => $pregunta_p181,
            'rejunteLimpioFoto2' => $pregunta_p182,
            'comentario' => $request['comentario'],
            'updated_at' => $request['updated_at'],
            'created_at' => $request['created_at'],
        ]);
        return redirect()->route('cuestionario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
