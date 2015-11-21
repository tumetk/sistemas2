<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Reservas;
use App\Models\Pedidos;
use App\Models\Cliente;

class DocumentoPago extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documento_pago';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['igv', 'subtotal', 'total','reserva_id','pedido_id','cliente_id'];

    public function reservas()
    {
        return $this->belongsTo(Reservas::class,'reserva_id');
    }

    public function pedidos()
    {
        return $this->belongsTo(Pedidos::class,'pedido_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    
}
