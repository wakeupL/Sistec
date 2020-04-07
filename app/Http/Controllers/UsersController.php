<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
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
        $users = DB::table('users')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {



        $user = new User($request->all());
        
        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        $user->save();
        Flash::primary('Se ha creado un usuario nuevo');
        return redirect()->route('users.index');
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
        $user = User::find($id);
        $roles = DB::table('roles')->get();
        return view('admin.users.edit', ['roles' => $roles])->with('user', $user);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rut = $request->rut;
        $user->status = $request->status;

        $user->save();
        Flash::primary('Se ha editado exitosamente.');
        return redirect()->route('users.index');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $id       = $request->id;
        $password = $request->newPassword;
        $confirm  = $request->confirmPassword;

        if($password != $confirm){

            Flash::primary('Las contraseñas no coinciden');
            return redirect()->route('users.index');

        }elseif($password == $confirm){

            $user = User::find($id);

            $newPassword = password_hash($password, PASSWORD_DEFAULT);

            $user->password = $newPassword;
            $user->save();

            FLash::primary('Se ha cambiado exitosamente la contraseña de '.$user->name);
            return redirect()->route('users.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $disable = '0';

        $user->status = $disable;
        $user->save();

        Flash::primary('El usuario ha sido desactivado correctamente.');
        return redirect()->route('users.index');
    }
}
