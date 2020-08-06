<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    public function responsible_text_note()
    {
        return $this->hasMany(ResponsibleTextNote::class, 'user_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'id');
    }
}
