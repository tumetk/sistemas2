<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class Proveedores extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proveedores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion'];

    public function productos()
    {
        return $this->belongsToMany(Productos::class,'almacen','proveedor_id','producto_id')->withPivot('stock','precio','url')->withTimestamps();
    }
}
