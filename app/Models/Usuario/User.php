<?php

namespace App\Models\Usuario;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<
     *     UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cargo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function permissoes()
    {
        return $this->hasMany(Permissao::class, 'user_id');
    }

    public function hasPermission(string $slug, ?string $type = null): bool
    {
        $checkPermissions = function ($query) use ($slug, $type) {
            $query->where('permissao_slug', $slug);
    
            if ($type) {
                $query->whereHas('tipo_permissao', function ($q) use ($type) {
                    $q->where('code', $type);
                });
            }
    
            return $query->exists();
        };
    
        $userPermission = $checkPermissions($this->permissoes());
    
        $perfilPermission = false;
        if ($this->cargo && $this->cargo->perfil) {
            $perfilPermission = $checkPermissions($this->cargo->perfil->permissoes());
        }
    
        return $userPermission || $perfilPermission;
    }
}
