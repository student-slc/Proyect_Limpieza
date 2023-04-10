<?php

namespace App\Http\Controllers;
//BUG Pra bugs
//HACK Para hacks
//FIXME Para fixmes
//TODO Para todo
//XXX Nose para que sirve
//[ ] No se para que sirve
//[x] No se para quee sirve
use Illuminate\Http\Request;
use App\Models\Cadenahotelera;
use App\Models\Hotele;



class ChoteleraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-CadenaHotelera|crear-CadenaHotelera|editar-CadenaHotelera|borrar-CadenaHotelera|ver-hoteles')->only('index');
        $this->middleware('permission:crear-CadenaHotelera', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-CadenaHotelera', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-CadenaHotelera', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = \Auth::user();
        $rol = $usuario->rol;
        if ($rol == 'SuperAdministrador') {
            $cadenahoteleras = Cadenahotelera::paginate(5);
        } else {
            $hotel = Hotele::where('nombre_hotel', '=', $usuario->hotel)->get();
            foreach($hotel as $hoteles){
                $chotelera=$hoteles->cadenahotelera;
            }
            $cadenahoteleras = Cadenahotelera::where('nombre_hotelera', '=', $chotelera)->paginate(5);
        }
        //Con paginación
        return view('chotelera.index', compact('cadenahoteleras'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $cadenahotelera->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chotelera.crear');
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
            'nombre_hotelera' => 'required',
        ]);

        Cadenahotelera::create($request->all());

        return redirect()->route('cadenahotelera.index');
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
    public function edit(Cadenahotelera $cadenahotelera)
    {
        return view('chotelera.editar', compact('cadenahotelera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadenahotelera $cadenahotelera)
    {
        request()->validate([
            'nombre_hotelera' => 'required',
        ]);


        $cadenahotelera->update($request->all());

        return redirect()->route('cadenahotelera.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadenahotelera $cadenahotelera)
    {
        $cadenahotelera->delete();

        return redirect()->route('cadenahotelera.index');
    }
}
