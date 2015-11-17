<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Citas;

class Servicios extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['detalle', 'precio', 'url'];

    public function citas()
    {
        return $this->hasMany(Citas::class,'servicios_id');
    }
    
}
