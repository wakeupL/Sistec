<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zones;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use DateTime;

class ZonesController extends Controller
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
        $zones = DB::table('zones')->get();
        return view('admin.zones.index', ['zones' => $zones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.zones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new DateTime();
        $request->validate([
            'zone' => 'required|unique:zones,name'
        ]);

        $newZone = new Zones();
        $newZone->name = strtoupper($request->zone);
        $newZone->status = '1';
        $newZone->created_at = $now;
        $newZone->updated_at = $now;
        $newZone->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido una nueva zona');
        //Redireccionamos a la vista
        return redirect()->route('zones.index');
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
        $zone = Zones::find($id);
        return view('admin.zones.edit', ['zone' => $zone]);
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
        $zone = Zones::find($id);
        $zone->name = strtoupper($request->zone);
        $zone->updated_at = $now;
        $zone->save();
        Flash::primary('Se ha editado exitosamente');
        return redirect()->route('zones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zones::find($id);
        $zone->status = '0';
        $zone->save();
        Flash::primary('Se ha eliminado la zona correctamente.');
        return redirect()->route('zones.index');

    }
}
