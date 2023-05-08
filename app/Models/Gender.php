<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gender extends Model
{
  use SoftDeletes;
  protected $table = "m_gender";

  protected $fillable = [
    'title'
  ];
}
