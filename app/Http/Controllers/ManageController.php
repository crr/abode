<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Nest\Nest;
use Cache;

class ManageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function receive(Request $request) {
        $input = Input::all();
        Cache::forget('nest.info');
        Cache::forget('nest.location');

        if(!empty($input['temp'])) {
            $min = 60;
            $max = 75;
            $value = $input['temp'];
            if($min <= $value && $value <= $max) {
                $nest = new Nest();
                $info = $nest->getDeviceInfo();
                $location = $nest->getUserLocations();
                Cache::put('nest.info', $info, 15);
                Cache::put('nest.location', $location[0], 15);
                $do = $nest->setTargetTemperatureMode(TARGET_TEMP_MODE_COOL, $value);
                $response = "<i class='fa fa-check'></i> You have successfully set the temperature to <b>".$value."ºF</b> degrees.";
            }
            else {
                $response = "<i class='fa fa-times'></i> You did not choose a valid temperature within <b>60-75</b>.";
            }
        }

        else if(!empty($input['fan15'])) {
            $nest = new Nest();
            $info = $nest->getDeviceInfo();
            $location = $nest->getUserLocations();
            Cache::put('nest.info', $info, 15);
            Cache::put('nest.location', $location[0], 15);
            $nest->setFanModeOnWithTimer(FAN_TIMER_15M);
            $response = "<i class='fa fa-check'></i> You have successfully turned the fan on for <b>15 minutes</b>.";
        }

        else if(!empty($input['fanoff'])) {
            $nest = new Nest();
            $info = $nest->getDeviceInfo();
            $location = $nest->getUserLocations();
            Cache::put('nest.info', $info, 15);
            Cache::put('nest.location', $location[0], 15);
            $nest->cancelFanModeOnWithTimer();

            $response = "<i class='fa fa-check'></i> You have successfully turned the fan off.";
        }

        else if(!empty($input['off'])) {
            $nest = new Nest();
            $info = $nest->getDeviceInfo();
            $location = $nest->getUserLocations();
            Cache::put('nest.info', $info, 15);
            Cache::put('nest.location', $location[0], 15);
            $nest->turnOff();
            $response = "<i class='fa fa-check'></i> You have successfully turned the thermostat <b>off</b>.";
        }

        else if(!empty($input['on'])) {
            $nest = new Nest();
            $info = $nest->getDeviceInfo();
            $location = $nest->getUserLocations();
            Cache::put('nest.info', $info, 15);
            Cache::put('nest.location', $location[0], 15);
            $nest->setTargetTemperatureMode(TARGET_TEMP_MODE_COOL, 70);
            $response = "<i class='fa fa-check'></i> You have successfully turned the thermostat <b>on</b> (and set to 70ºF).";
        }

        else {
            return redirect('/');
        }

            return view('welcome')
            ->with('response', $response);
    }
}
