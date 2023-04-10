<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camarista;
use App\Models\Hotele;
use App\Models\Log;



class CamaristasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-camarista|crear-camarista|editar-camarista|borrar-camarista')->only('index');
        $this->middleware('permission:crear-camarista', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-camarista', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-camarista', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $usuario=\Auth::user();
        $hotel=$usuario->hotel;
        $camarista=Camarista::where('hotel','=',$hotel)->paginate(5);
        $camaristas = Camarista::paginate(5);
        $logs_c = Log::where('event','=','Camarista created')->paginate(5);
        $logs_u = Log::where('event','=','Camarista updated')->paginate(5);
        $logs_d = Log::where('event','=','Camarista deleted')->paginate(5);
        return view('camaristas.index', compact('camaristas','camarista','logs_c','logs_u','logs_d'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $camaristas->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario=\Auth::user();
        $hotel=$usuario->hotel;
        $hotele=Hotele::all();
        $hoteles=Hotele::where('nombre_hotel','=',$hotel)->get();
        return view('camaristas.crear',compact('hotele','hoteles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'hotel' => 'required',
            'camarista' => 'required',
            'status' => 'required',
        ]);
        Camarista::create($request->all());
        return redirect()->route('camaristas.index');
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
    public function edit(Camarista $camarista)
    {
        $hotele=Hotele::all();
        return view('camaristas.editar', compact('camarista','hotele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camarista $camarista)
    {
        request()->validate([
            'hotel' => 'required',
            'camarista' => 'required',
            'status' => 'required',
        ]);

        $camarista->update($request->all());

        return redirect()->route('camaristas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camarista $camarista)
    {
        $camarista->delete();
        return redirect()->route('camaristas.index');
    }
}
