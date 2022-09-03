<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['start', 'end', 'route_id', 'bus_id', 'driver_id'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
