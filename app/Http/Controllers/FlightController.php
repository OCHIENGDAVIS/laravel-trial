<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Flight;
use App\User;

class FlightController extends Controller
{
    function listFlight(Request $request)
    {
        $f = new Flight();
        // $f->name = 'KQ Flight';
        // $f->destination = 'Malawi';
        // $f->origin = 'Kenya';
        // $f->save();
        $flights = Flight::all();
        foreach ($flights as $flight) {
            echo $flight;
            echo "<hr />";
        }
        return "We have to list the flights that we have";
    }
    function getFlight()
    {
        $flight_id  = 1;
        $flight = Flight::where('origin', 'kenya');
        echo "<h2>This is flight number " . $flight_id . "</h3>";
        // echo $flight;
        return view('welcome', ['name' => 'davis']);
    }
}
