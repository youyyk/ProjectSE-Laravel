<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory,SoftDeletes;
    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function bills(){
        return $this->belongsToMany(Bill::class)->withTimestamps();
    }
}
