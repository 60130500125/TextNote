<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResponsibleTextNote extends Model
{
    protected $table = 'responsible_text_note';

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function text_note()
    {
        return $this->belongsTo(TextNote::class, 'id');
    }
}
