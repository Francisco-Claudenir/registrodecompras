<?php

namespace App\Models;

use App\Observers\AuditoriaObserver;
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
    protected $table = 'users';

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

    public static function boot()
    {
        parent::boot();
        parent::observe(AuditoriaObserver::class);

    }

    public function user_pp_i_b_inscricao()
    {
        return $this->hasMany(PP_IndicacaoBolsistasInscricao::class, 'id')->withTrashed();
    }
    public function user_pp_inscricao()
    {
        return $this->hasMany(PrimeirosPassosInscricao::class, 'user_id','id')->withTrashed();
    }
    public function user_bati_inscricao()
    {
        return $this->hasMany(BatiInscricao::class, 'user_id','id')->withTrashed();
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'perfil_id','id');
    }

    public function hasPerfil(array $perfil)
    {
        $perfilAtual = $this->perfil;
        return $perfilAtual && in_array($perfilAtual->nome, $perfil);
    }

    public function cpf()
    {
        $cpf = '*.' . substr($this->cpf, 3, 3) . '.' . substr($this->cpf, 6, 3) . '-**';
        return $cpf;
    }
}
