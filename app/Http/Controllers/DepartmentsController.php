<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departments;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use DateTime;

class DepartmentsController extends Controller
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
        $departments = DB::table('departments')->get();
        return view('admin.departments.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
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
            'department' => 'required|unique:departments,name'
        ]);

        $newDepartment = new Departments();
        $newDepartment->name = strtoupper($request->department);
        $newDepartment->status = '1';
        $newDepartment->created_at = $now;
        $newDepartment->updated_at = $now;
        $newDepartment->save();
        //Mensaje a mostrar una vez guardado
        Flash::primary('Se ha añadido un nuevo departamento.');
        //Redireccionamos a la vista
        return redirect()->route('departments.index');
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
        $department = Departments::find($id);
        return view('admin.departments.edit', ['department' => $department]);
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
        $department = Departments::find($id);
        $department->name = strtoupper($request->department);
        $department->updated_at = $now;
        $department->save();
        Flash::primary('Se ha editado exitosamente');
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Departments::find($id);
        $department->status = '0';
        $department->save();
        Flash::primary('Se ha eliminado el departamento correctamente.');
        return redirect()->route('departments.index');
    }
}
