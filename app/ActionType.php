<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActionType extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'deleted_at',
    ];

    // Table Name
    protected $table = 'action_types';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
    
    public function user(){
        return $this->belongsTo('App\User');
    }    
}
