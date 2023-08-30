<?php

namespace App\Http\Controllers\Student\Auth;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/student/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student');
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('web.student.register',[
            'registerRoute' => 'student.register',
            'forgotPasswordRoute' => 'student.password.request',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\student
     */
    protected function register(Request $request)
    {
        // Field Validation
        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:students,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create Account
        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'password_text' => Crypt::encryptString($request->password),
        ]);

        return redirect()
            ->route('student.login')
            ->with('success', __('auth_account_created_successfully'));
    }
}
