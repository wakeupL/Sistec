<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distrit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use DateTime;

class DistritsController extends Controller
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
        $comunas = DB::table('distrits')
                            ->join('states', 'states.id', '=', 'distrits.states_id')
                            ->join('zones', 'zones.id', '=', 'distrits.zones_id')
                            ->select('distrits.id', 'distrits.name', 'distrits.status','states.name as region', 'zones.name as zone')
                            ->get();
        return view('admin.distrits.index', ['distrits' => $comunas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table('states')->get();
        $zones = DB::table('zones')->get();
        return view('admin.distrits.create')->with('states', $states)
                                            ->with('zones', $zones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $now = new datetime();
        $request->validate([
            'distrit' => 'required|max:40|unique:distrits,name',
            'state'   => 'required|int',
            'zone'    => 'int'
        ]);

        $distrits = new Distrit();
        $distrits->name = strtoupper($request->distrit);
        $distrits->status = '1';
        $distrits->created_at = $now;
        $distrits->updated_at = $now;
        $distrits->states_id = $request->state;
        $distrits->zones_id = $request->zone;
        $distrits->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido una nueva comuna');
        //Redireccionamos a la vista
        return redirect()->route('distrits.index');

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
        $distrits = Distrit::find($id);
        $states = DB::table('states')->get();

        return view('admin.distrits.edit', ['states' => $states])
                                            ->with('distrits', $distrits);
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
        $distrit = Distrit::find($id);
        $distrit->name = strtoupper($request->distrits);
        $distrit->updated_at = $now;
        $distrit->states_id = $request->state;
        $distrit->save();
        Flash::primary('Se ha editado exitosamente');
        return redirect()->route('distrits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distrit = Distrit::find($id);
        $distrit->status = '0';
        $distrit->save();
        Flash::primary('Se ha eliminado la comuna correctamente.');
        return redirect()->route('distrits.index');
    }
}
