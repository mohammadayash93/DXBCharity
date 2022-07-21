<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $table = 'contact';

    protected $fillable = [
        'name', 'ar_name', 'description', 'ar_description', 'image', 'email', 'mobile', 'address', 'ar_address',
        'location', 'facebook', 'instagram', 'snapchat', 'tiktok', 'youtube'
    ];
}
