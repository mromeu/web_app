<?php

namespace App\Http\Controllers\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\Usuario\Perfil;
use Illuminate\Http\Request;

class BancoController extends Controller
{

    public string $_controller_name = 'banco';
    public string $_controller_title = 'Bancos';

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

        return view($this->_controller_name. '.index',
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
        return view($this->_controller_name. '.create',             [
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
            $this->_controller_name. '_nome' => 'required',
            $this->_controller_name. '_codigo' => 'required',
            $this->_controller_name. '_sigla' => 'required'
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
        $model = Perfil::findOrFail($id);

        return view($this->_controller_name. '.edit', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => $model
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'perfil_nome' => 'required|string|max:255',
            'perfil_admin' => 'nullable|boolean',
        ]);

        Perfil::findOrFail($id)->update([
            'perfil_nome' => $request->perfil_nome,
            'perfil_admin' => $request->perfil_admin,
            'active' => $request->active,
        ]);

        return redirect()->route('perfil.edit', $id)->with('success', 'Atualizado com sucesso!');
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
