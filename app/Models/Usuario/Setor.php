<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setor extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'setor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'setor_nome',
        'setor_codigo',
        'active',
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

    public function cargos()
    {
        return $this->hasMany(Cargo::class, 'setor_id');
    }

    public function userIns()
    {
        return $this->belongsTo(User::class, 'user_ins_id');
    }

    public function userUpd()
    {
        return $this->belongsTo(User::class, 'user_upd_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

}
