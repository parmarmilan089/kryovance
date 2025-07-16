<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'model_name',
        'qty',
        'category_id',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
