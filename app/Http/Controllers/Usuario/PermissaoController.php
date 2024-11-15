<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario\Perfil;
use App\Models\Usuario\User;
use App\Models\Usuario\Permissao;
use App\Models\Usuario\TipoPermissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{

    public string $_controller_name = 'permissao';
    public string $_controller_title = 'Permissão';
    public string $_dir_view = 'app.usuario.permissao';

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
        $rows = Permissao::with(['tipo_permissao'])->get();


        $user = User::find(1); // Substitua pelo ID de um usuário válido

       // dd($user->hasPermission('user.fa', 'CAD'));

        return view($this->_dir_view. '.index',
            [
                'controller_name' => $this->_controller_name,
                'controller_title' => $this->_controller_title,
                'rows' => $rows
            ]
        );



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissoes     = TipoPermissao::pluck('name', 'id')->toArray();
        $usuarios       = User::pluck('name', 'id')->toArray();
        $perfis         = Perfil::pluck('perfil_nome', 'id')->toArray();

        return view($this->_dir_view. '.create',             [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => null,
            'permissoes' => $permissoes,
            'usuarios' => $usuarios,
            'perfis' => $perfis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /*$request->validate([
            $this->_controller_name. '_nome' => 'required',
            $this->_controller_name. '_slug' => 'required'
        ]);*/

        $model = new Permissao();
        $model->new($request);

        return redirect()->route($this->_controller_name. '.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Permissao::findOrFail($id);
        $permissoes     = TipoPermissao::pluck('name', 'id')->toArray();
        $usuarios       = User::pluck('name', 'id')->toArray();
        $perfis         = Perfil::pluck('perfil_nome', 'id')->toArray();

        return view($this->_dir_view. '.edit', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => $model,
            'permissoes' => $permissoes,
            'usuarios' => $usuarios,
            'perfis' => $perfis
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perfil = Permissao::findOrFail($id);
        $perfil->update($request->only(
            $this->_controller_name. '_slug',
            'perfil_id',
            'user_id',
            'tipo_permissao_id'
        ));

        return redirect()->route($this->_controller_name. '.edit', $id)->with('success', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $model = Permissao::findOrFail($request->id);

        if ($model->delete()) {
            return response()->json(['success' => true, 'message' => 'Dados salvos com sucesso!']);
        }

        return redirect()->back()->with('error', 'Erro ao atualizar o status.');
    }
}
