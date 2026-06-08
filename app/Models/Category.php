<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name','icon', 'type'];

    public function user() {
    return $this->belongsTo(\App\Models\User::class);
    }
}
