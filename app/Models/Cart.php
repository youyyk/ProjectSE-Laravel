<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function menus(){
        return $this->belongsToMany(Menu::class)->withTimestamps()->withPivot('total');
    }
}
