<?php

namespace App\Models;
   

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Training extends Model
{
    protected $fillable = [
        'date',
        'distance',
        'duration',
        'notes',
    ];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->toDateString();
    }
}

