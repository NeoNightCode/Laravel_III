<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Usuario extends Model
{

    public function getEdadAttribute()
    {
        return Carbon::parse($this->f_nacimiento)->age;
    }

    public function restoreAllDeletedUsers()
    {
        return Usuario::onlyTrashed()->restore();
    }
    
    public $timestamps = false;
    use HasFactory, SoftDeletes;
}
