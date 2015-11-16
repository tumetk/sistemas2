<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Servicios;
use App\Cotizaciones;

class Cliente extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['correo', 'nombres', 'apellido_paterno','apellido_materno','dni'];

    public function cotizaciones()
    {
        return $this->hasMany(Cotizaciones::class,'cliente_id');
    }

    public function documentos_pago()
    {
        return $this->hasMany(DocumentoPago::class,'cliente_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedidos::class,'cliente_id');
    }

    public function reservas()
    {
        return $this->hasMany(Reservas::class,'cliente_id');
    }

    
}
