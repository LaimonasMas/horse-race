<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Better extends Model
{
    use HasFactory;
    public function betterHorse()
    {
        return $this->belongsTo('App\Models\horse', 'horse_id', 'id');
    }
}
