<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{

    public string $_controller_name = 'setor';
    public string $_controller_title = 'Setor';
    public string $_dir_view = 'app.usuario.setor';

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
        $rows = Setor::all();

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
            $this->_controller_name. '_nome' => 'required',
            $this->_controller_name. '_codigo' => 'required',
        ]);

        $model = new Setor();
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
        $model = Setor::findOrFail($id);

        return view($this->_dir_view. '.edit', [
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
        $request->validate([
            $this->_controller_name. '_nome' => 'required',
            $this->_controller_name. '_codigo' => 'required',
        ]);

        Setor::findOrFail($id)->update([
            $this->_controller_name. '_nome' => $request->{$this->_controller_name. '_nome'},
            $this->_controller_name. '_codigo' => $request->{$this->_controller_name. '_codigo'},
            'active' => $request->active,
        ]);

        return redirect()->route($this->_controller_name. '.edit', $id)->with('success', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $model = Setor::findOrFail($request->id);

        if ($model->delete()) {
            return response()->json(['success' => true, 'message' => 'Dados salvos com sucesso!']);
        }

        return redirect()->back()->with('error', 'Erro ao atualizar o status.');
    }
}
