<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'cpf', 'telefone', 'endereco', 'password', 'perfil_id'
    ];
    protected $casts = [
        'endereco' => 'array'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_pp_i_b_inscricao()
    {
        return $this->hasMany(PP_IndicacaoBolsistasInscricao::class, 'id')->withTrashed();
    }
    public function user_pp_inscricao()
    {
        return $this->hasMany(PrimeirosPassosInscricao::class, 'passos_inscricao_id')->withTrashed();
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id');
    }

    public function hasPerfil(string $perfil)
    {
        $perfilAtual = $this->perfil;
        return $perfilAtual && $perfilAtual->nome == $perfil;
    }
}
