<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


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
        return $this->belongsTo(Cliete::class,'cliente_id');
    }

    
}
