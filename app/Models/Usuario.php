<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Usuario extends Model
{

    public function getEdadAttribute()
    {
        return Carbon::parse($this->f_nacimiento)->age;
    }

    
    public $timestamps = false;
    use HasFactory;
}
