<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Event;
use App\EventCategories;
use App\EventImages;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function event(){

        $events = DB::select('select * from events');

        return view('pages.admin.event', ['events'=>$events]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $eventinfo = $request->all();

        $addressid = Address::create($eventinfo);
        $eventinfo['addressId'] = $addressid->id;
        Event::create($eventinfo);



        return 'You have successfully created an Event!';


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event = Event::find($id);


        return Event::make('admin.event')
            ->with('events', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
