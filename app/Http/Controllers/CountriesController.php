<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use App\Http\Requests\CountryRequest;
use DateTime;
use Illuminate\Support\Facades\Validator;

class CountriesController extends Controller
{

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = DB::table('countries')->get();
        return view('admin.countries.index', ['countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
        $now = new DateTime();
        //Validamos que el campo no esté vacio y que sea unico
        $request->validate([
            'pais' => 'required|unique:countries,name'
        ]);
        //Guardamos
        $country = new Country();
        $country->name = strtoupper($request->pais);
        $country->status = '1';
        $country->created_at = $now;
        $country->updated_at = $now;
        $country->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido nuevo país');
        //Redireccionamos a la vista
        return redirect()->route('countries.index');

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
        $country = Country::find($id);
        return view('admin.countries.edit')->with('country', $country);
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
        $country = Country::find($id);
        $country->name = strtoupper($request->pais);
        $country->updated_at = $now;
        $country->save();
        Flash::primary('Se ha editado exitosamente');
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->status = '0';
        $country->save();

        Flash::primary('Se ha eliminado el pais');
        return redirect()->route('countries.index');
    }
}
