<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\User;

class Cotizaciones extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cotizaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cliente_id', 'observaciones','user_id'];

    public function cliente()
    {
        return $this->belongsTo(User::class,'cliente_id');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicios::class,'cotizaciones_servicios','cotizacion_id','servicios_id')->withTimestamps();
    } 

    
}
