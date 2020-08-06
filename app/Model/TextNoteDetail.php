<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TextNoteDetail extends Model
{
    protected $table = 'text_note_detail';

    public function text_note()
    {
        return $this->belongsTo(TextNote::class, 'text_note_id');
    }
}
