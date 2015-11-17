<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Servicios;

class Citas extends Model 
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'citas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['servicios_id', 'turno', 'estado'];

    public function servicios()
    {
        return $this->belongsTo(Servicios::class);
    }
}
