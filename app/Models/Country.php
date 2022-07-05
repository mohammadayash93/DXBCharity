<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $table = 'countries';

    protected $fillable = [
        'name', 'ar_name', 'iso2', 'iso3', 'phonecode'
    ];


    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
