<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventAttendance;
use App\User;
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

    public function cancel(Request $request)
    {
        $attend = EventAttendance::where('user_id', session('user')['id'])->where('event_id', $request->eventid)->where('status', 1)->first();

        if ($attend->status == 1) {
            $attend->status = 0;
            $attend->save();
            alert()->success('Event', 'Cancelled');
            return redirect()->back();
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::find(session('user')['id']);
        $users = $users->attendance()->where('status', '=','1')->paginate(5);

        return view('pages.member.event.userjoin', ['users' => $users]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
