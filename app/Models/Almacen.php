<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Almacen extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'almacen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['precio', 'producto_id', 'proveedor_id','stock'];

    public function pedidos()
    {
        return $this->belongsToMany(Pedidos::class,'pedidos_productos_almacen','producto_almacen_id','pedido_id')->withPivot('cantidad','total','descripcion','url')->withTimestamps();
    }
}
