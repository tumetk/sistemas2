<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Servicios;
use App\Models\Cotizaciones;
use App\Models\DocumentoPago;
use App\Models\Pedidos;
use App\Models\Reservas;

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
