<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'phone', 'social_security_number'];

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
