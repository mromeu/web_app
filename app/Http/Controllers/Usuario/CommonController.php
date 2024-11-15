<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\CommonModel;
use App\Models\CommonTable;
use Illuminate\Http\Request;

class CommonController extends Controller
{

    public string $_controller_name = 'common';
    public string $_controller_title = 'Configurações Gerais';
    public string $_dir_view = 'app.common';


    public function init()
    {
        $controller_name = $this->_controller_name;
        $controller_title = $this->_controller_title;
    }

    public function index()
    {

        $common_tables = CommonTable::all()->sortBy('common_table_db_name');

        return view($this->_dir_view.'.index', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'rows' => $common_tables,
        ]);
    }

    public function create()
    {
        return view($this->_dir_view. '.create', [
            'controller_name' => $this->_controller_name,
            'controller_title' => $this->_controller_title,
            'model' => null
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'common_table_name' => 'required|string|max:255',
            'common_table_db_name' => 'required|string|max:255|unique:common_tables,common_table_db_name',
        ]);

        CommonTable::create($request->all());
        return redirect()->route('common.index')->with('success', 'Tabela cadastrada com sucesso!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nome_banco_de_dados' => 'required|string|max:255|unique:common_tables,nome_banco_de_dados,'.$id,
        ]);

        $table = CommonTable::findOrFail($id);
        $table->update($request->all());

        return redirect()->route($this->_controller_name. '.index')->with('success', 'Tabela atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $table = CommonTable::findOrFail($id);
        $table->delete();

        return redirect()->route($this->_controller_name. '.index')->with('success', 'Tabela removida com sucesso!');
    }

    public function api(Request $request)
    {
        if ($request->isMethod('get')) {
            $rows = [];
            $common_model = new CommonModel();
            $rows = $common_model->getAll(array(), $request->table_name, array('name' => 'ASC'));

            return response()->json($rows);
        }

        if ($request->isMethod('post')) {
            $common_model = new CommonModel();

            $values = [
                'name' => $request->name,
                'code' => $request->code,
                'active' => 1
            ];

            if($request->has('id') and $request->filled('id')){
                return $common_model->edit($values, $request->id, $request->table_name);

            } else {
                return $common_model->new($values, $request->table_name);
            }
        }

        if ($request->isMethod('put')) {
            $common_model = new CommonModel();

            $values = [
                'active' => $request->active
            ];

            return $common_model->edit($values, $request->id, $request->table_name);
        }

        if ($request->isMethod('delete')) {
            $common_model = new CommonModel();

            return $common_model->remove($request->id, $request->table_name);
        }

        return null;
    }
}
