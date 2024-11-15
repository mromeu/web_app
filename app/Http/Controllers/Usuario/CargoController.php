<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario\Cargo;
use App\Models\Usuario\Perfil;
use App\Models\Usuario\Setor;
use Illuminate\Http\Request;

class CargoController extends Controller
{

    public string $_controller_name = 'cargo';
    public string $_controller_title = 'Cargo';
    public string $_dir_view = 'app.usuario.cargo';

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
        $rows = Cargo::with(['perfil', 'setor', 'superiores'])->get();
        return view($this->_dir_view. '.index',
            [
                'controller_name' => $this->_controller_name,
                'controller_title' => $this->_controller_title,
                'rows' => $rows,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = Setor::active()->pluck('setor_nome', 'id')->toArray();
        $perfis = Perfil::active()->pluck('perfil_nome', 'id')->toArray();
        $cargos = Cargo::active()->pluck('cargo_nome', 'id')->toArray();

        return view($this->_dir_view . '.create', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => null,
            'setores' => $setores,
            'perfis' => $perfis,
            'cargos' => $cargos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            $this->_controller_name. '_nome' => 'required',
            'setor_id'  => 'required',
            'perfil_id' => 'required',
        ]);

        $model = new Cargo();
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
        $model = Cargo::findOrFail($id);
        $setores = Setor::active()->pluck('setor_nome', 'id')->toArray();
        $perfis = Perfil::active()->pluck('perfil_nome', 'id')->toArray();
        $cargos = Cargo::active()->pluck('cargo_nome', 'id')->toArray();

        return view($this->_dir_view . '.edit', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => $model,
            'setores' => $setores,
            'perfis' => $perfis,
            'cargos' => $cargos,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            $this->_controller_name. '_nome' => 'required',
            $this->_controller_name. '_lideranca' => 'nullable|boolean',
            'setor_id'  => 'required',
            'perfil_id' => 'required',
        ]);

        Cargo::findOrFail($id)->update([
            $this->_controller_name. '_nome' => $request->{$this->_controller_name. '_nome'},
            $this->_controller_name. '_lideranca' => $request->{$this->_controller_name. '_lideranca'},
            'cargo_superior_id' => $request->cargo_superior_id,
            'setor_id'  => $request->setor_id,
            'perfil_id' => $request->perfil_id,
            'active' => $request->active,
        ]);

       return redirect()->route($this->_controller_name. '.edit', $id)->with('success', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $model = Cargo::findOrFail($request->id);

        if ($model->delete()) {
            return response()->json(['success' => true, 'message' => 'Dados salvos com sucesso!']);
        }

        return redirect()->back()->with('error', 'Erro ao atualizar o status.');
    }
}
