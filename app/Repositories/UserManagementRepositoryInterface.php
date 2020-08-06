<?php

namespace App\Repositories;

interface UserManagementRepositoryInterface
{
    public function createUser($data);
    public function getAllUser();
    public function getLogin($data);
    public function createUniversity($data);
    public function getAllUniversity();
}
