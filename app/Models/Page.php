<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $table = 'pages';

    protected $fillable = [
        'name', 'ar_name', 'description', 'ar_description', 'image'
    ];

}
