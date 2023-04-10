<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* function __construct()
    {
        $this->middleware('permission:ver-cuestionario|crear-cuestionario|editar-cuestionario|borrar-cuestionario')->only('index');
        $this->middleware('permission:crear-cuestionario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cuestionario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cuestionario', ['only' => ['destroy']]);
    } */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
