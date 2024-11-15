<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario\Perfil;
use App\Models\Usuario\Permissao;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public string $_controller_name = 'perfil';
    public string $_controller_title = 'Perfil';
    public string $_dir_view = 'app.usuario.perfil';

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
        $rows = Perfil::all();

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
        return view($this->_dir_view. '.create',             [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            $this->_controller_name. '_nome' => 'required'
        ]);

        $model = new Perfil();
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
        $model = Perfil::with('permissoes')->findOrFail($id);
        $permissoes = Permissao::all();

        return view($this->_dir_view. '.edit', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => $model,
            'permissoes' => $permissoes
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perfil = Perfil::findOrFail($id);

        $request->validate([
            'perfil_nome' => 'required|string|max:255',
            'perfil_admin' => 'nullable|boolean',
        ]);

        $perfil->update($request->only(
            'perfil_nome', 
            'perfil_admin', 
            'active'
        ));

        $permissoes = $request->input('permissoes', []); // Array de permissões marcadas
        $perfil->permissoes()->sync($permissoes);

        return redirect()->route($this->_controller_name. '.edit', $id)->with('success', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $model = Perfil::findOrFail($request->id);

        if ($model->delete()) {
            return response()->json(['success' => true, 'message' => 'Dados salvos com sucesso!']);
        }

        return redirect()->back()->with('error', 'Erro ao atualizar o status.');
    }
}
