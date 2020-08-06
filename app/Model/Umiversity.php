<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'university';

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
