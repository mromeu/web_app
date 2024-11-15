<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario\Cargo;
use App\Models\Usuario\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public string $_controller_name = 'user';
    public string $_controller_title = 'Usuário';
    public string $_dir_view = 'app.usuario.users';

    public function init()
    {
        $controller_name = $this->_controller_name;
        $controller_title = $this->_controller_title;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$user_rows= User::all();
        $user_rows = User::with(['cargo'])->get();

        return view($this->_dir_view. '.index',
            [
                'controller_name' => $this->_controller_name,
                'controller_title' => $this->_controller_title,
                'user_rows' => $user_rows
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargos = Cargo::active()->pluck('cargo_nome', 'id')->toArray();

        return view($this->_dir_view. '.create', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => null,
            'cargos' => $cargos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user::create([
            'name' => $request->name,
            'email' => $request->email,
            'cargo_id' => $request->cargo_id,            
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route($this->_controller_name. '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);
        $cargos = Cargo::active()->pluck('cargo_nome', 'id')->toArray();

        return view($this->_dir_view. '.edit', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => $user,
            'cargos' => $cargos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cargo_id = $request->cargo_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route($this->_controller_name. '.edit', $id)->with('success', 'Usuário atualizado com sucesso!');

    }

    public function changePassword(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $request->validate([
            'user_pass' => 'required',
        ]);

        $user->password = Hash::make($request->nova_senha);
        $user->save();

        return response()->json(true);
    }

    public function active(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->active = $request->active;
        $user->save();

        return response()->json(true);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return response()->json(true);
    }
}
