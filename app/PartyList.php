<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartyList extends Model
{
    // Table Name
    protected $table = 'party_lists';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
}
