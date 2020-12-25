<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Mail\userReminderMail;
use Mail;
use Carbon\Carbon;
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function userRecord()
    {
        return $this->userService->userRecord();
    }
    public function userReminderMail()
    {
    	$email = 'youremail@gmail.com'; 
        $data['name'] = 'your name';
        $data['subject'] = 'Signup Mail';
        $data['from'] = 'studywithkishan@gmail.com';

        Mail::to($email)->send(new userReminderMail($data));
    }
    public function addMonths()
    {
        $current_time = Carbon::now();
        $after_month_added = $current_time->addMonths(6);
        //converting the date time to readable form
        $readable_date = $after_month_added->toDateTimeString();
        dd($readable_date);
    }
  
    public function trackDistance()
    {
        $longitude_1 = 20.593683;
        $latittude_1 = 78.962883;
        $longitude_2 = 37.090240;
        $latittude_2 = -95.712891;
        $unit = "k"; // K for kilometer

         function distance($latittude_1, $longitude_1, $latittude_2, $longitude_2, $unit) {
                    if (($latittude_1 == $latittude_2) && ($latittude_1 == $longitude_2)) {
                      return 0;
                    }
                    else {
                      $theta = $longitude_1 - $longitude_2;
                      $dist = sin(deg2rad($latittude_1)) * sin(deg2rad($latittude_2)) +  cos(deg2rad($latittude_1)) * cos(deg2rad($latittude_2)) * cos(deg2rad($theta));
                      $dist = acos($dist);
                      $dist = rad2deg($dist);
                      $miles = $dist * 60 * 1.1515;
                      $unit = strtoupper($unit);
                  
                      if ($unit == "K") {
                        return ($miles * 1.609344);
                      }
                    }
                  }

                  $distance_in_km = distance($latittude_1, $longitude_1, $latittude_2, $longitude_2, $unit);
                  return response()->json(['response' => ['code' => '200', 'distance' => $distance_in_km]]);
    }
}
