<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ForgotPassword;
use App\Models\MailSetting;
use App\Models\Student;
use Password;
use Auth;
use Mail;
use DB;

class ForgotPasswordController extends Controller
{
    /**
     * Only guests for "student" guard are allowed except
     * for logout.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student');
    }

    /**
     * Show the reset email form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm(){
        return view('web.student.passwords.email',[
            'passwordEmailRoute' => 'student.password.email'
        ]);
    }

    /**
     * Show the reset email form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request){
        
        // Field Validation
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Student::where('email', $request->email)->first();
        $mail = MailSetting::where('status', '1')->first();

        if(isset($user) && isset($mail->sender_email) && isset($mail->sender_name)){
            $token = str_random(32);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token,
            ]);

            // Passing data to email template
            $data['first_name'] = $user->first_name;
            $data['last_name'] = $user->last_name;
            $data['email'] = $user->email;
            $data['token'] = $token;

            // Mail Information
            $data['subject'] = __('auth_reset_password_notification');
            $data['from'] = $mail->sender_email;
            $data['sender'] = $mail->sender_name;

            // Send Mail
            Mail::to($data['email'])->send(new ForgotPassword($data));

            return redirect()->back()->with('success', __('auth_password_reset_link_mailed'));
        }
        
        return redirect()->back()->with('error', __('auth_account_not_found'));
    }

    /**
     * password broker for student guard.
     * 
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker(){
        return Password::broker('students');
    }

    /**
     * Get the guard to be used during authentication
     * after password reset.
     * 
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(){
        return Auth::guard('student');
    }
}
