<?php

namespace App\Http\Controllers;

use App\EventModel;
use App\Korisnici;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{

    public function index()
    { //code should be inside a method


        $sviEventi = EventModel::select('event_models.*')
                            ->where('imeDoktora', '=', Auth::user()->name)->get();

        foreach($sviEventi as $event){
            $events[] = \Calendar::event(
                $event->title, //event title
                false, //full day event?
               $event->startTime, //start time (you can also use Carbon instead of DateTime)
                $event->end, //end time (you can also use Carbon instead of DateTime)
                1 //optionally, you can specify an event ID
            );
        }



        $eloquentEvent = EventModel::all(); //EventModel implements MaddHatter\LaravelFullcalendar\Event
        if(Auth::user()->name === "Kemal Kapić"){
        $calendar = \Calendar::addEvents($events)//add an array with addEvents
        ->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            'eventColor' => '#FF9900'
        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            'viewRender' => 'function() {}'

        ]);}

        else{
            $calendar = \Calendar::addEvents($events)//add an array with addEvents
            ->setOptions([ //set fullcalendar options
                'firstDay' => 1,
                'eventColor' => '#FF0033'
            ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'viewRender' => 'function() {}'

            ]);
        }


        return view('pregled', compact('calendar'));
    }


}

