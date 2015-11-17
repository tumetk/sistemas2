<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

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
    protected $fillable = ['cliente_id', 'observaciones'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    
}
