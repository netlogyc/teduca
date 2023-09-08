<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    public $token;
    public $header;

    public function __construct()
    {
        $response = Http::withHeaders([
            "Accept"=> "application/json",
            "api-token"=> "C9BJhJt4hpvPEIL1LIZ4BbTo4TbosDg2R5avH7eXs_scbtuXj0Nz7ynah3VMqNV4YVI",
            "user-email"=> "juliang1012@gmail.com"
        ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

        $this->token = $response->json('auth_token');

        $this->header =  Http::withHeaders([
            "Authorization" =>"Bearer ".$this->token,
            "Accept" =>"application/json"
        ]);

    }

    public function getCountries(){
    
        $countries = $this->header->get('https://www.universal-tutorial.com/api/countries/');
        return json_decode($countries);


    }
    public function getStates($country){

        $states = $this->header->get('https://www.universal-tutorial.com/api/states/'.$country);
        return json_decode($states);

    }
    public function getCities($state){

        $cities = $this->header->get("https://www.universal-tutorial.com/api/cities/".$state);
        return json_decode($cities);

    }
}
