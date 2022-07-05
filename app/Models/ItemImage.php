<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;
    public $table = 'items_images';

    protected $fillable = [
        'image',
    ];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
