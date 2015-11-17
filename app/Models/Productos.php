<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Pedidos;

class Productos extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion'];

    

    public function proveedores()
    {
        return $this->belongsToMany(Proveedores::class,'almacen','producto_id','proveedor_id')->withPivot('precio','stock')->withTimestamps();
    } 
}  
