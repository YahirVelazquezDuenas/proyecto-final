<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aceite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_aceite';
    public function detallesCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'id_aceite', 'id_aceite');
    }

    protected $fillable = ['nombre', 'tipo', 'cantidad', 'marca', 'descripcion', 'precio', 'archivo_ubicacion', 'archivo_nombre'];
    protected $guarded = ['id_aceite'];

}
