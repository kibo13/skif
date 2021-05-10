<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'note'
    ];

    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }
}
