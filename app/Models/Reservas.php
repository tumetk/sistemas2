<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Reservas extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_hora', 'cliente_id', 'confirmada'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function citas()
    {
        return $this->belongsToMany(Citas::class,'reserva_citas','reserva_id','cita_id')->withTimestamps();
    }

    
}
