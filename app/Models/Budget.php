<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['user_id', 'category_id', 'nominal_limit'];

    public function user() {
    return $this->belongsTo(\App\Models\User::class);
    }

    public function category() {
    return $this->belongsTo(\App\Models\Category::class);
}
}
