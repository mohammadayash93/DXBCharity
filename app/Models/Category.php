<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $table = 'categories';

    protected $fillable = [
        'name', 'ar_name', 'image'
    ];


    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
