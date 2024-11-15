<?php

namespace App\Models\Usuario;

use App\Models\CommonModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Permissao extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'permissao_slug',
        'tipo_permissao_id',
        'perfil_id',
        'user_id',
    ];


    public function new($request) {

        $request = $request
        ->except(['_token', 'id']);

        /*$request['user_ins_id'] = Auth::user()->id;
        $request['user_upd_id'] = Auth::user()->id;*/

        return $this::create($request);
    }

    public function edit($request, $id) {

        $id = $request->id;

        /*$request['user_ins_id'] = Auth::user()->id;
        $request['user_upd_id'] = Auth::user()->id;*/

        return $this::create($request);
    }

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'perfil_permissao');
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tipo_permissao()
    {
        return $this->belongsTo(TipoPermissao::class, 'tipo_permissao_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

}
