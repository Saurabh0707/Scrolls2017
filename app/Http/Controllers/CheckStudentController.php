<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Member;

class CheckStudentController extends ApiController
{
     public function checkStudentNo(Request $request)
    {
        $user = Member::where('student_no', $request->student_no)->first();
        if($user)
        {
            
            return $this->errorResponse('This participant already exists',422);
        }
        else
        {
            
            return $this->errorResponse('This participant does not exist',200);
        }

    }

    public function checkEmail(Request $request)
    {
        $email = Member::where('email', $request->email)->first();
        //dd($email);
        if($email)
        {
            return $this->errorResponse('This email id already exists',422);
        }
        else
        {
            return $this->errorResponse('This email id does not exist',200);
        }

    }
}
