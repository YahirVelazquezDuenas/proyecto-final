<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'comentario'];

    protected $guarded = ['id_cliente'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    use SoftDeletes;

    protected $dates = ['deleted_at'];

}
