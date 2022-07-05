<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $table = 'cities';

    protected $fillable = [
        'name', 'ar_name', 'country_id'
    ];


    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
