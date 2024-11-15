<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cargo extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cargo';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cargo_superior_id',
        'setor_id',
        'perfil_id',
        'cargo_nome',
        'cargo_lideranca',
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

    public function setor()
    {
        return $this->belongsTo(Setor::class, 'setor_id');
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    public function subordinados()
    {
        return $this->hasMany(Cargo::class, 'cargo_superior_id');
    }

    public function superiores()
    {
        return $this->belongsTo(Cargo::class, 'cargo_superior_id');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'cargo_id');
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
