<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statuses;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use DateTime;

class StatusesController extends Controller
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
        $statuses = Statuses::all();
        return view('admin.statuses.index', ['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statuses.create');
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
            'statuses' => 'required|unique:statuses,name'
        ]);

        $newStatus = new Statuses();
        $newStatus->name = strtoupper($request->statuses);
        $newStatus->status = '1';
        $newStatus->created_at = $now;
        $newStatus->updated_at = $now;
        $newStatus->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido un nuevo estado de ticket.');
        //Redireccionamos a la vista
        return redirect()->route('statuses.index');
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
        $statuses = Statuses::find($id);
        return view('admin.statuses.edit', ['statuses' => $statuses]);
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
        $statuses = Statuses::find($id);
        $statuses->name = strtoupper($request->statuses);
        $statuses->updated_at = $now;
        $statuses->save();
        Flash::primary('Se ha editado exitosamente');
        return redirect()->route('statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statuses = Statuses::find($id);
        $statuses->status = '0';
        $statuses->save();
        Flash::primary('Se ha eliminado el estado correctamente.');
        return redirect()->route('statuses.index');
    }
}
