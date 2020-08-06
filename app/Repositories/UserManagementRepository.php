<?php

namespace App\Repositories;

use App\Model\User;
use App\Model\University;

class UserManagementRepository implements UserManagementRepositoryInterface
{
    public function createUser($data)
    {
        $user = new User;
        $user->user_id = $data['user_id'];
        $user->user_name = $data['user_name'];
        $user->position = $data['position'];
        $user->university_id = $data['university_id'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->password = $password;
        $user->save();
    }

    public function createUniversity($data)
    {
        $university = new University;
        $university->university_name = $data['university_name'];
        $university->abbreviations_university = $data['abbreviations_university'];
        $university->student_assosiation = $data['student_assosiation'];
        $university->abbreviations_student_assosiation = $data['abbreviations_student_assosiation'];
        $university->save();
    }

    public function getAllUniversity()
    {
        $university = University::all();
        return $university;
    }

    public function getAllUser()
    {
        $user = User::all();
        return   $user;
    }

    public function getLogin($data)
    {
        $user = User::where('user.user_id', $data['user_id'])->first();;
        $password = $user->password;
        $result = password_verify($data['password'], $password);
        return $result;
    }
}
