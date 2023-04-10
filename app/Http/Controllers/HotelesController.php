<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadenahotelera;
use App\Models\Hotele;

class HotelesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-hoteles|crear-hoteles|editar-hoteles|borrar-hoteles')->only('index');
        $this->middleware('permission:crear-hoteles', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-hoteles', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-hoteles', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        //$hoteles = Hotele::paginate(5);
        //return view('hoteles.index', compact('hoteles'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $hotele->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nombre)
    {
        return view('hoteles.crear',compact('nombre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$nombre)
    {
        request()->validate([
            'nombre_hotel' => 'required',
        ]);

        Hotele::create([
            'nombre_hotel'=>request('nombre_hotel'),
            'cadenahotelera'=>$nombre,
            'created_at'=>request('created_at'),
            'updated_at'=>request('updated_at'),
        ]);
        return redirect()->route('hoteles.show',$nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        $hoteles=Hotele::where('cadenahotelera','=',$nombre)->paginate(5);
        return view('hoteles.index', compact('hoteles','nombre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotele $hotele)
    {
        return view('hoteles.editar', compact('hotele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotele $hotele)
    {
        request()->validate([
            'nombre_hotel' => 'required',
        ]);
        $nombre=$hotele->cadenahotelera;
        $hotele->update($request->all());
        return redirect()->route('hoteles.show',$nombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotele $hotele)
    {
        $hotele->delete();
        $nombre=$hotele->cadenahotelera;
        return redirect()->route('hoteles.show',$nombre);
    }
}
