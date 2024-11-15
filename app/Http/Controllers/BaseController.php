<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    //
    public function setActiveStatus($table, $id, $status)
    {
        return DB::table($table)->where('id', $id)->update(['active' => $status]);
    }

}
