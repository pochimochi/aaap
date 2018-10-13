<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Event;
use App\EventAttendance;
use App\EventImages;
use App\Images;
use App\logs;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;


class EventController extends Controller
{
    public function event()
    {

        $events = Event::all();

        return view('pages.contentsmanager.event', ['events' => $events]);
    }


    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:100',
            'description' => 'required|max:500',
            'venue' => 'required|max:50',
            'city' => 'required',
            'unitno' => 'required|max:5',
            'bldg' => 'required|max:50',
            'street' => 'required|max:50'

        ]);
        $eventinfo = $request->all();
        $event = new Event($eventinfo);
        $eventinfo['city_id'] = City::create(['name' => $eventinfo['city']])->id;
        $eventinfo['address_id'] = Address::create($eventinfo)->id;
        $eventinfo['posted_by'] = session('user')['id'];

        $eventinfo['image_name'] = $request->file('eventImage')->getClientOriginalName();
        $img = (new \Intervention\Image\ImageManager)->make($request->file('eventImage'));
        /*$img->resize(850, 315, function ($constraint) {
            $constraint->aspectRatio();
        });*/
        Storage::put('public/' . $eventinfo['image_name'] . '', (string)$img->encode());
        $eventinfo['image_id'] = Images::create(['location' => $eventinfo['image_name']])->id;
        $eventinfo['event_id'] = Event::create($eventinfo)->id;
        /*EventImages::create(['image_id' => $eventinfo['image_id'], 'event_id' => $eventinfo['event_id']]);*/

        $log = new logs();
        $log->savelog(session('user')['id'], 'Added an Event');
        alert()->success('Event', 'Added');
        return redirect()->back();

    }

    public function edit($eventId)
    {

        $event = Event::find($eventId);

        return view('pages.contentsmanager.eventedit', ['event' => $event]);


    }

    public function update(Request $request, $eventId)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|max: 500',
            'venue' => 'required|max:50',
            'status' => 'required',
            'city' => 'required',
            'unitno' => 'required|max:5',
            'bldg' => 'required|max:50',
            'street' => 'required|max:50'
        ]);


        $eventinfo = $request->except(['_token']);
        $event = Event::find($eventId);


        if ($request->file('eventImage') != null) {
            $eventinfo['image_name'] = $request->file('eventImage')->getClientOriginalName();
            $img = (new \Intervention\Image\ImageManager)->make($request->file('eventImage'));
            $img->resize(850, 315, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('public/' . $eventinfo['image_name'] . '', (string)$img->encode());
            $eventinfo['image_id'] = Images::create(['location' => $eventinfo['image_name']])->id;

        }


        City::where('id', $event->address->city->id)
            ->update(['name' => $eventinfo['city']]);

        Address::where('id', $event->address->id)
            ->update(['street' => $eventinfo['street'], 'bldg' => $eventinfo['bldg'], 'unitno' => $eventinfo['unitno']]);

        $eventinfo['modified_by'] = session('user')['id'];
        $eventinfo = $request->except(['_token', 'street', 'bldg', 'eventImage', 'unitno', 'city', 'city_id', 'fileToUpload', 'event_image']);


        Event::where('id', $eventId)
            ->update($eventinfo);

        $log = new logs();
        $log->savelog(session('user')['id'], 'Updated an Event');
        alert()->success('Event', 'Updated');
        return redirect('/contentmanager/event');

    }

    public function changeStatus($eventId, $status)
    {
        $event = Event::find($eventId);
        $event->status = $status;
        if ($event->save()) {
            $log = new logs();
            $log->savelog(session('user')['id'], 'Changed an Event Status');

            toast('Status Changed!', 'success', 'bottom-left');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }

    public function userevent()
    {
        $events = Event::all()->where('status', '=', 1);
        return view('pages.member.event.userevent', ['events' => $events]);
    }

//    public function userjoin(Request $request, $eventId)
//    {
//
//        $attendance['user_id'] = Auth::user()->id;
//        $attendance['event_id'] = $eventId;
//        $attendance['status'] = 1;
//
//        EventAttendance::where($attendance);
//
//        return view('pages.member.event.userjoin', ['events' => $eventId]);
//
//    }

    public function userjoins(Request $request, $eventId)
    {

        $attend = $request->except(['_token']);



        $attendance['user_id'] = Auth::user()->id;
        $attendance['event_id'] = $eventId;
        $attendance['status'] = 1;

        EventAttendance::create($attendance);


        alert()->success('Event', 'Joined');
        return redirect()->back();
    }

    public function usercancels($attendanceid)
    {
        $attendance = EventAttendance::findorfail($attendanceid);

        $attendance->delete();

        return redirect('member/userevent', 'You are not Joined in this Event Anymore.');
    }

}



