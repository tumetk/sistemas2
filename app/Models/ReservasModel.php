<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


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

    
}
