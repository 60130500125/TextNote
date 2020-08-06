<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TextNote extends Model
{
    protected $table = 'text_note';

    public function responsible_text_note()
    {
        return $this->hasMany(ResponsibleTextNote::class, 'text_note_id');
    }

    public function text_note_detail()
    {
        return $this->hasOne(TextNote::class, 'id');
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class, 'id');
    }
}
