<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'deleted_at',
    ];
    protected $fillable = ['user_id', 'name', 'description'];
 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Table Name
    protected $table = 'tasks';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
}
