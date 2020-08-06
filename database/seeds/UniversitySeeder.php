<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Model\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = (array) array(
            [
                "id" => "1",
                "university_name" => "มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี",
                "abbreviations_university" => "มจธ.",
                "student_assosiation" => "สโมสรนักศึกษาคณะเทคโนโลยีสารสนเทศ",
                "abbreviations_student_assosiation" => "สนทศ."
            ],
            [
                "id" => "2",
                "university_name" => "มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ",
                "abbreviations_university" => "มจพ.",
                "student_assosiation" => "สโมสรนักศึกษาคณะเทคโนโลยีสารสนเทศ",
                "abbreviations_student_assosiation" => "สนทศ."
            ],
            [
                "id" => "3",
                "university_name" => "สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง",
                "abbreviations_university" => "สจล.",
                "student_assosiation" => "สโมสรนักศึกษาคณะเทคโนโลยีสารสนเทศ" ,
                "abbreviations_student_assosiation" => "สนทศ."
            ]
        );
        foreach($universities as $university){
            $temp_university = new University;
            $temp_university->id = Arr::get($university,'id');
            $temp_university->university_name = Arr::get($university,'university_name');
            $temp_university->abbreviations_university = Arr::get($university,'abbreviations_university');
            $temp_university->student_assosiation = Arr::get($university,'student_assosiation');
            $temp_university->abbreviations_student_assosiation = Arr::get($university,'abbreviations_student_assosiation');
            $temp_university->save();
        }
    }
}
