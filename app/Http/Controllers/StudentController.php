<?php

namespace App\Http\Controllers;

use App\Modules\StudentModule\Module;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $studentModule;

    public function __construct()
    {
        $this->studentModule    = new Module();
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ownName    = isset($request->name)    ? $request->name    : null;
        $ownBrth    = isset($request->birthday) ? $request->birthday : null;

        $data = [
            'name'  => $ownName,
            'birthday'  => $ownBrth
        ];

        // $resultName     =   $this->studentModule->name($ownName);
        // $resultBrth     =   $this->studentModule->birthday($ownBrth);

        $result = $this->studentModule->student($data);

        return $result;
    }
}
