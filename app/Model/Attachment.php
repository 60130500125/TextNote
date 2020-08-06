<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachment';

    public function text_note()
    {
        return $this->belongsTo(TextNote::class, 'text_note_id');
    }
}
