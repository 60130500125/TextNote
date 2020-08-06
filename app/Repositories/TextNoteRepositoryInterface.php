<?php

namespace App\Repositories;

interface TextNoteRepositoryInterface
{
    public function createTextNote($data);
    public function addAttachment($data);
    public function deleteTextNote($data);
    public function getAllTextNote();
    public function getTextNote($id);

    //Test
    public function createAttachment($data);
}
