<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'comentario'];

    protected $guarded = ['id_cliente'];

}
