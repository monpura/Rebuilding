<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    // Table Name
    protected $table = 'product_lists';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
}
