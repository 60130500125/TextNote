<?php

namespace App\Repositories;

use App\Model\TextNote;
use App\Model\ResponsibleTextNote;
use App\Model\TextNoteDetail;
use App\Model\Attachment;
use App\Model\University;
use App\Model\UserToTextNote;

class TextNoteRepository implements TextNoteRepositoryInterface
{
    public function createTextNote($data)
    {
        $check_text_note = TextNote::where('text_note.date', $data['date'])->get();
        count($check_text_note);
        if (count($check_text_note) >= 50000) {
            return 'เกินจำนวน';
        } else {
            $timestamp = strtotime($data['date']);
            $year = date('Y', $timestamp);
            $check_year = TextNote::where('year', $year)->orderBy('id', 'DESC')->first();
            $text_note_number = 1;

            if ($check_year != null) {
                $check_year->text_note_number++;
                $text_note_number = $check_year->text_note_number;
            }

            $text_note = new TextNote;
            $text_note->work_section = $data['work_section'];
            $text_note->topic = $data['topic'];
            $text_note->date = $data['date'];
            $text_note->year = $year;
            $text_note->text_note_number = $text_note_number;
            $text_note->save();

            foreach ($data['from'] as $value) {
                $responsible = new ResponsibleTextNote;
                $responsible->user_id = $value;
                $responsible->text_note_id = $text_note->id;
                $responsible->save();
            }

            $to_text_note = new UserToTextNote;
            $to_text_note->user_id = $data['to'];
            $to_text_note->text_note_id = $text_note->id;
            $to_text_note->save();


            $text_note_detail = new TextNoteDetail;
            $text_note_detail->detail = $data['detail'];
            $text_note_detail->conclude = $data['conclude'];
            $text_note_detail->text_note_id = $text_note->id;
            $text_note_detail->save();

            $user_responsible = University::join('user', 'user.university_id', '=', 'university.id')
                ->where('user.user_id', $responsible->user_id)->first();
            $university = $user_responsible->abbreviations_university;
            $abbreviations_student_assosiation = $user_responsible->abbreviations_student_assosiation;
            $at = $abbreviations_student_assosiation . '.' . $university . ' ' . $text_note->text_note_number . '/' . $year;
            TextNote::where('text_note.id', $responsible->text_note_id)->update(['text_note.at' => $at]);
        }
    }


    public function deleteTextNote($data)
    {
        $text_note_id = $data['text_note_id'];
        TextNote::where('text_note.id', $text_note_id)->delete();
    }

    public function addAttachment($data)
    {
        if ($data['attachment']) {
            $text_note = TextNote::where('text_note.topic', $data['topic'])->get();
            foreach ($data['attachment'] as $value) {
                $attachment = new Attachment;
                $name = $value->getClientOriginalName();
                $path = $value->storeAs('/attachments', $name);
                $attachment->name = $name;
                $attachment->attachment = $path;
                $attachment->text_note_id = $text_note->id;
                $attachment->save();
            }
        }
    }

    public function getAllTextNote()
    {
        $text_note = TextNote::all();
        return $text_note;
    }

    public function getTextNote($id)
    {
        $text_note = TextNote::where('text_note.id', $id)
            ->join('text_note_detail', 'text_note_detail.text_note_id', '=', 'text_note.id')->first();

        $from = ResponsibleTextNote::where('responsible_text_note.text_note_id', $id)
            ->join('user', 'user.user_id', '=', 'responsible_text_note.user_id')
            ->join('university', 'university.id', '=', 'user.university_id')
            ->get();

        $to = UserToTextNote::where('user_to_text_note.text_note_id', $id)
            ->join('user', 'user.user_id', '=', 'user_to_text_note.user_id')
            ->join('university', 'university.id', '=', 'user.university_id')
            ->get();

        $text_note->from = $from;
        $text_note->to = $to;

        return $text_note;
    }


    // Test
    public function createAttachment($data)
    {
        foreach ($data['attachment'] as $value) {
            $attachment = new Attachment;
            $name = $value->getClientOriginalName();
            $path = $value->storeAs('/attachments', $name);
            $attachment->name = $name;
            $attachment->attachment = $path;
            $attachment->save();
        }
    }
}
