<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ActivateController extends BaseController
{
    //

    public function toggleStatus(Request $request)
    {
        $success = $this->setActiveStatus($request->table_name, $request->id, $request->active);

        if ($success) {
            return response()->json(['success' => true, 'message' => 'Dados salvos com sucesso!']);
        }

        return redirect()->back()->with('error', 'Erro ao atualizar o status.');
    }    
}
