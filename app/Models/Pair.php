<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    protected $guarded = ['id'];

    public function journals(){
        return $this->hasMany(Journal::class);
    }
}
