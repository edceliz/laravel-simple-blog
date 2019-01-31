<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function author() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
