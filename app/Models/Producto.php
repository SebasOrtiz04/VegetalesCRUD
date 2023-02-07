<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    public function unidad()
    {
        return $this->belongsTo(Unidad::class,'unidad_id');
    }

    protected $fillable=[
        'nombre',
        'descripcion',
        'cantidad',
        'unidad_id',
        'created_at',
        'updated_at'
    ];
}
