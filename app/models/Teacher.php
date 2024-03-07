<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Interface\InterfaceModel;

class Teacher extends BaseModel implements InterfaceModel
{
    function getListTeacher()
    {
        $sql = "select * from teacher";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getTeacherbyId($id)
    {
        $sql = "SELECT * FROM `teacher` WHERE id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function add($name, $email, $salary, $school)
    {
        $sql = "INSERT INTO `teacher`(`name`, `email`, `salary`, `school`)
         VALUES (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $salary, $school]);
    }
    public function edit($id, $name, $email, $salary, $school)
    {
        $sql = "UPDATE `teacher` SET `name`=?,
                `email`=?,`salary`=?,`school`=? WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $salary, $school, $id]);
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM `teacher` WHERE id = ?';
        $this->sql = $sql;
        return $this->execute([$id]);
    }
}