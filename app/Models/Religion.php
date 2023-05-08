<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Religion extends Model
{
    use SoftDeletes;
    protected $table = 'm_religion';
    
    protected $fillable = [
        'title'
    ];
}
