<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\States;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use DateTime;

class StatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = DB::table('states')
                            ->join('countries' , 'countries.id', '=', 'states.countries_id')
                            ->select('states.id','states.name','states.status','countries.name as country')
                            ->get();
        return view('admin.states.index', ['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('countries')->get();
        return view('admin.states.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Obtenemos Hora y Fecha
        $now = new datetime();
        //Validamos que el campo no esté vacio y que sea unico
        $request->validate([
            'state' => 'required|unique:states,name',
            'country' => 'required|int'
        ]);
        //Guardamos
        $state = new States();
        $state->name = strtoupper($request->state);
        $state->status = '1';
        $state->created_at = $now;
        $state->updated_at = $now;
        $state->countries_id = $request->country;
        $state->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido una nueva región');
        //Redireccionamos a la vista
        return redirect()->route('states.index');
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
        $state = States::find($id);
        $countries = DB::table('countries')->get();
        return view('admin.states.edit', ['country' => $countries])
                                        ->with('state', $state);
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
        $now = new DateTime();
        $state = States::find($id);
        $state->name = strtoupper($request->state);
        $state->updated_at = $now;
        $state->countries_id = $request->country;
        $state->save();
        Flash::primary('Se ha editado exitosamente');
        return redirect()->route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = States::find($id);
        $state->status = '0';
        $state->save();
        Flash::primary('Se ha eliminado la región correctamente.');
        return redirect()->route('states.index');
    }
}
