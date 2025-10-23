<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    protected $cats = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
