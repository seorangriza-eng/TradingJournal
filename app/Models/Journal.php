<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'hourly_first_cisd' => 'boolean',
        'saldo' => 'integer',
    ];

    public function pair(){
        return $this->belongsTo(Pair::class);
    }
}
