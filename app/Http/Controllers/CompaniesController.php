<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use DateTime;

class CompaniesController extends Controller
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
        $companies = DB::table('companies')->get();
        return view('admin.companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nCompany'  => 'required',
            'rut'       => 'required|unique:companies,rut',
            'email'     => 'required|unique:companies,email|email',
            'address'   => 'required',
            'phone'     => 'required|max:11'
        ]);

        $now = new DateTime();

        $newCompany = new Companies();
        $newCompany->name = strtoupper($request->nCompany);
        $newCompany->rut  = $request->rut;
        $newCompany->email = $request->email;
        $newCompany->address = $request->address;
        $newCompany->phone_number = $request->phone;
        $newCompany->status = '1';
        $newCompany->created_at = $now;
        $newCompany->updated_at = $now;

        $newCompany->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido una nueva empresa');
        //Redireccionamos a la vista
        return redirect()->route('companies.index');
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
        $company = Companies::find($id);
        return view('admin.companies.edit', ['company' => $company]);

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
        $request->validate([
            'nCompany'  => 'required',
            'rut'       => 'required',
            'email'     => 'required|email',
            'address'   => 'required',
            'phone'     => 'required|max:11'
        ]);

        $now = new DateTime();

        $editCompany = Companies::find($id);
        $editCompany->name = strtoupper($request->nCompany);
        $editCompany->rut  = $request->rut;
        $editCompany->email = $request->email;
        $editCompany->address = $request->address;
        $editCompany->phone_number = $request->phone;
        $editCompany->status = '1';
        $editCompany->updated_at = $now;

        $editCompany->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha editado la empresa correctamente.');
        //Redireccionamos a la vista
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::find($id);
        $company->status = '0';
        $company->save();
        Flash::primary('La empresa ha sido desactivada exitosamente.');
        return redirect()->route('companies.index');
    }
}
