<?php

namespace App\Services\Student;

interface StudentService
{
    public function getAll();
    public function get($student_id);
    public function save($studentData,$media = null);
    public function update($student_id,$studentData,$media = null);
    public function delete($student_id);
}
