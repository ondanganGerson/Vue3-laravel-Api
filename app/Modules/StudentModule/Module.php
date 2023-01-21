<?php

namespace App\Modules\StudentModule;

use App\Adapters\RepositoryAdapter;
use App\Modules\StudentModule\UseCases\StudentUseCase;

class Module
{

    private $studentRepository;

    public function __construct()
    {
        $this->studentRepository    = (new RepositoryAdapter('Student'))->getInstance();
    }


    // public function name($ownName)
    // {
    //     $studentUseCase = new StudentUseCase($this->studentRepository);
    //     $result         = $studentUseCase->run($ownName);

    //     return $result;
    // }

    // public function birthday($ownBrth)
    // {
    //     $studentUseCase = new StudentUseCase($this->studentRepository);
    //     $result         = $studentUseCase->run($ownBrth);

    //     return $result;
    // }

    public function student($data)
    {
        $studentUseCase = new StudentUseCase($this->studentRepository);
        $result         = $studentUseCase->run($data);

        return $result;

    }

}