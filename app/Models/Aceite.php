<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aceite extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_aceite';
    public function detallesCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'id_aceite', 'id_aceite');
    }

    public function setPrecioAttribute($value)
    {
        $this->attributes['precio'] = $value * 17.13;
    }
    public function getPrecioAttribute($value)
    {
        return $value / 17.13;
    }

    protected $fillable = ['nombre', 'tipo', 'cantidad', 'marca', 'descripcion', 'precio', 'archivo_ubicacion', 'archivo_nombre'];
    protected $guarded = ['id_aceite'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
