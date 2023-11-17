<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compras extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_compra';
    public function detallesCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'id_compra', 'id_compra');
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    protected $fillable = ['id_cliente', 'fecha', 'metodo', 'total'];

    protected $guarded = ['id_compra'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
