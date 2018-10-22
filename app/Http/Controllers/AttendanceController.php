<?php

namespace App\Http\Controllers;

use App\EventAttendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function join(Request $request)
    {

        $attendance['user_id'] = session('user')['id'];
        $attendance['event_id'] = $request->id;
        $attendance['status'] = 1;
        EventAttendance::create($attendance);
        alert()->success('Event', 'Joined');
        return redirect()->back();
    }

    public function cancel($id)
    {
        $attend = EventAttendance::find($id);
        if ($attend->status == 1) {
            $attend->status = 0;
        } else {
            $attend->status = 1;
        }
        alert()->success('Event', 'Cancelled');
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attend = EventAttendance::find($attendId);
        Event::where('id', $attend->events->id)->find($eventId);
        return view('pages.member.event.userjoin', ['events' => $attend]);
    }

    /**
     * Show the form for creating a new resource.
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
