<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory,SoftDeletes;

    public function restable(){
        return $this->belongsTo(Restable::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menus(){
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }
}
