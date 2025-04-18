<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable {

    protected $table = 'category';
    protected $fillable = ['name'];
    
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

}
