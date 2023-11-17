<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
