<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table = 'detalle_compra';
    protected $primaryKey = 'id_detalle';
    public function compra()
    {
        return $this->belongsTo(Compras::class, 'id_compra', 'id_compra');
    }

    public function aceite()
    {
        return $this->belongsTo(Aceite::class, 'id_aceite', 'id_aceite');
    }
    protected $fillable = ['id_compra', 'id_aceite', 'cantidad'];

    protected $guarded = ['id_detalle'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
