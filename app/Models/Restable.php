<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restable extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var mixed
     */

    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }
}
