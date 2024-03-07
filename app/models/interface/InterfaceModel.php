<?php

namespace App\Models\Interface;

interface InterfaceModel
{
    public function add($name, $email, $salary, $school);
    public function edit($id, $name, $email, $salary, $school);
    public function delete($id);
}