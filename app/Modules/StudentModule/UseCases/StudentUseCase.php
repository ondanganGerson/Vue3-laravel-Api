<?php

namespace App\Modules\StudentModule\UseCases;

use App\Modules\StudentModule\Entities\StudentEntity;

class StudentUseCase
{

    public function __construct(private $studentRepository){}

    public function run($sampleParam)
    {
        $sampleEntity = new StudentEntity($this->studentRepository);
        $result = $sampleEntity->run($sampleParam);
        
        return $result;
    }
}