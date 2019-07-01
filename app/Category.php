<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Table Name
    protected $table = 'categories';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
}
