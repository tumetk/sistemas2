<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Almacen;
use App\Models\Cliente;
use App\User;
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
    protected $fillable = ['cantidad', 'total','cliente_id','confirmado','user_id'];

    public function productos()
    {
        return $this->belongsToMany(Almacen::class, 'pedidos_productos_almacen', 'pedido_id', 'producto_almacen_id')->withPivot('cantidad','total','descripcion','url')->withTimestamps();
    }

    public function cliente()
    {
        return $this->belongsTo(User::class,'cliente_id');
    }
}
