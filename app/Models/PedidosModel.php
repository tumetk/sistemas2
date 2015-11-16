<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Servicios;

class Pedidos extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pedidos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad', 'total', 'producto_id','cliente_id','confirmado'];

    public function productos()
    {
        return $this->belongsTo(Productos::class,'producto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
}
