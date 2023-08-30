<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\SMSSetting;
use Twilio\Rest\Client;
use Exception;

trait SMSSender {

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    public function nexmo($message, $recipients)
    {
        $sms = SMSSetting::first();

        $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY", $sms->nexmo_key), getenv("NEXMO_SECRET", $sms->nexmo_secret));

        $client = new \Nexmo\Client($basic);

        if($client == true){
        $message = $client->message()->send([
            'to' => $recipients,
            'from' => $sms->nexmo_sender_name,
            'text' => $message
        ]);
        }
    }

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    public function twilio($message, $recipients)
    {
        $sms = SMSSetting::first();

        $account_sid = getenv("TWILIO_SID", $sms->twilio_sid);
        $auth_token = getenv("TWILIO_AUTH_TOKEN", $sms->twilio_auth_token);
        $twilio_number = getenv("TWILIO_NUMBER", $sms->twilio_number);

        $client = new Client($account_sid, $auth_token);

        if($client == true){
        $client->messages->create($recipients, 
                [
                    'from' => $twilio_number, 
                    'body' => $message
                ]);
        }
    }

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients string or array of phone number of recepient
     */
    public function sender($row, $message, $recipients)
    {
        $sms = SMSSetting::first();

        // Shortcode Replace
        $first_name = $row->student->first_name ?? '';
        $last_name = $row->student->last_name ?? '';
        $student_id = $row->student->student_id ?? '';
        $batch = $row->student->batch->title ?? '';
        $faculty = $row->student->program->faculty->title ?? '';
        $program = $row->student->program->title ?? '';
        $session = $row->session->title ?? '';
        $semester = $row->semester->title ?? '';
        $section = $row->section->title ?? '';
        $father_name = $row->student->father_name ?? '';
        $mother_name = $row->student->mother_name ?? '';
        $email = $row->student->email ?? '';
        $phone = $row->student->phone ?? '';


        $search = array('[first_name]', '[last_name]', '[student_id]', '[batch]', '[faculty]', '[program]', '[session]', '[semester]', '[section]', '[father_name]', '[mother_name]', '[email]', '[phone]');

        $replace = array('<span>'.$first_name.'</span>', '<span>'.$last_name.'</span>', '<span>'.$student_id.'</span>', '<span>'.$batch.'</span>', '<span>'.$faculty.'</span>', '<span>'.$program.'</span>', '<span>'.$session.'</span>', '<span>'.$semester.'</span>', '<span>'.$section.'</span>', '<span>'.$father_name.'</span>', '<span>'.$mother_name.'</span>', '<span>'.$email.'</span>', '<span>'.$phone.'</span>');

        $string = strip_tags($message);
        $dynamic_message = str_replace($search, $replace, $string);


        // Send Message
        if($sms->status == 1){

            $account_sid = getenv("TWILIO_SID", $sms->twilio_sid);
            $auth_token = getenv("TWILIO_AUTH_TOKEN", $sms->twilio_auth_token);
            $twilio_number = getenv("TWILIO_NUMBER", $sms->twilio_number);

            $client = new Client($account_sid, $auth_token);

            if($client == true){
            $client->messages->create($recipients, 
                    [
                        'from' => $twilio_number, 
                        'body' => $dynamic_message
                    ]);
            }
        }
        elseif($sms->status == 2){

            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY", $sms->nexmo_key), getenv("NEXMO_SECRET", $sms->nexmo_secret));

            $client = new \Nexmo\Client($basic);

            if($client == true){
            $nexmo_message = $client->message()->send([
                'to' => $recipients,
                'from' => $sms->nexmo_sender_name,
                'text' => $dynamic_message
            ]);
            }
        }
    }
}