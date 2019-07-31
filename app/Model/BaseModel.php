<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $table;
    protected $primaryKey;
    public $timestamps = false;
}