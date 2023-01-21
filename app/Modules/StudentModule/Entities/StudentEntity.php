<?php

namespace App\Modules\StudentModule\Entities;

use App\Models\Student;

class StudentEntity
{
    public function __construct(private $studentRepository){}

    public function run($sampleParam)
    {
        Student::create($sampleParam);
    }
}