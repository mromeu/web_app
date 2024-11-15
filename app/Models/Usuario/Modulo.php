<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Modulo extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modulo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modulo_nome',
        'user_ins_id',
        'user_upd_id'
    ];


    public function new($request) {

        $request = $request
        ->except(['_token', 'id']);

        $request['user_ins_id'] = Auth::user()->id;
        $request['user_upd_id'] = Auth::user()->id;

        return $this::create($request);
    }

    public function edit($request, $id) {

        $id = $request->id;

        $request['user_ins_id'] = Auth::user()->id;
        $request['user_upd_id'] = Auth::user()->id;

        return $this::create($request);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

}
