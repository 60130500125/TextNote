<?php

namespace App\Http\Controllers;

use App\Repositories\TextNoteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TextNoteController extends Controller
{
    private $text_note;

    public function __construct(TextNoteRepositoryInterface $text_note)

    {
        $this->text_note = $text_note;
    }

    public function storeTextNote(Request $request)
    {

        $data = $request->all();

        $text_note = $this->text_note->createTextNote($data);
        // $this->text_note->addAttachment($data);

        if ($text_note == 'เกินจำนวน') {
            return response()->json('เกินจำนวน 50,000 ฉบับต่อวัน', 500);
        }
        return response()->json('สำเร็จ', 200);
    }

    public function deleteTextnote(Request $request)
    {
        $data = $request->all();

        $this->text_note->deleteTextNote($data);
        return response()->json('สำเร็จ', 200);
    }

    public function indexAllTextNote()
    {
        $text_note = $this->text_note->getAllTextNote();
        return response()->json($text_note, 200);
    }

    public function indexTextNote($id)
    {
        $text_note = $this->text_note->getTextNote($id);
        return response()->json($text_note, 200);
    }


    //Test
    public function storeAttachment(Request $request)
    {
        $data = $request->all();
        $this->text_note->createAttachment($data);
        return response()->json('สำเร็จ', 200);
    }
}
