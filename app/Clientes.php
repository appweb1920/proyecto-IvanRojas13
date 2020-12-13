<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['nombre', 'apellido', 'numTelefono', 'deuda', 'pago'];

    public function productoRelacionado() 
    {
        return $this->belongsTo('App\Productos', 'producto_id');
        //return $this->belongsToMany('App\Productos', 'producto_id');

    }
}