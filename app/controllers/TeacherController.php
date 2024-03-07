<?php

namespace App\Controllers;

use App\Models\Teacher;

class TeacherController extends BaseController
{
    public $table;
    public function __construct()
    {
        $this->table =  new Teacher();
    }
    public function getTeacher()
    {
        $teachers = $this->table->getListTeacher();
        return $this->render('teacher.index', compact('teachers'));
    }
}