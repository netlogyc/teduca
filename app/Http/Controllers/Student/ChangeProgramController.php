<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Auth;

class ChangeProgramController extends Controller
{
    public function loginWithProgram(Request $request)
    {
        Auth::guard('student')->logout();
        //attempt login.
        $student = Student::where('email', $request->email)->where('program_id',$request->program_id)->first();

        Auth::login($student);
        //Authenticated
        return redirect()->intended(route('student.dashboard.index'))->with('success', __('auth_logged_in'));
        
    }
}
