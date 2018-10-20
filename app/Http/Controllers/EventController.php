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
    public function index()
    {
        if (session('user')) {
            if (session('role') == 3) {
                $events = Event::paginate(10);
                return view('pages.contentsmanager.event.create', ['events' => $events]);
            } else if (session('role') == 4) {
                $events = Event::where('status', '=', '1')->paginate(10);;
                return view('pages.member.event.index', ['events' => $events]);
            }
        } else {
            return redirect('/home');
        }
    }

//    public function joined($attendId, $eventId)
//    {
//        $attend = EventAttendance::find($attendId);
//        Event::where('id', $attend->events->id)->find($eventId);
//        return view('pages.member.event.joined', ['events' => $attend]);
//    }

    public function userjoin($attendId, $eventId)
    {
        $attend = EventAttendance::find($attendId);
        Event::where('id', $attend->events->id)->find($eventId);
        return view('pages.member.event.userjoin', ['events' => $attend]);

    }

    public function show($id)
    {
        if (session('user')) {
            if (session('role') == 3) {
                $event = Event::where('id', $id)->first();
                return view('pages.contentsmanager.event.show', compact('event', 'id'));
            } else if (session('role') == 4) {
                $event = Event::where('id', $id)->first();
                return view('pages.member.event.show', compact('event', 'id'));
            }
        } else {
            return redirect('/home');
        }
    }

    public function create()
    {
        $events = Event::all();

        return view('pages.contentsmanager.event.create', ['events' => $events]);
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
            'street' => 'required|max:50',
            'start_date' => 'date|after:today',
            'end_date' => 'nullable|date|after:start_date',
        ], [
            'unitno.required' => 'The house/apartment/unit number is required.',
            'bldg.required' => 'The building field is required.'
        ]);
        $eventinfo = $request->all();

        $event = new Event($eventinfo);
        $eventinfo['city_id'] = City::create(['name' => $eventinfo['city']])->id;
        $eventinfo['address_id'] = Address::create($eventinfo)->id;
        $eventinfo['posted_by'] = session('user')['id'];

        if ($request->file('eventImage') != null) {
            $eventinfo['image_name'] = $request->file('eventImage')->getClientOriginalName();
            $request->file('eventImage')->storeAs('public', $eventinfo['image_name']);
            $eventinfo['image_id'] = Images::create(['location' => $eventinfo['image_name']])->id;


        } else {
            $eventinfo['image_id'] = 0;
        }
        dd($eventinfo);
        $eventinfo['event_id'] = Event::create($eventinfo)->id;
        /*EventImages::create(['image_id' => $eventinfo['image_id'], 'event_id' => $eventinfo['event_id']]);*/

        $log = new logs();
        $log->savelog(session('user')['id'], 'Added an Event');
        alert()->success('Event', 'Added');
        return redirect('contentmanager/events/create');

    }

    public function edit($eventId)
    {
        $event = Event::find($eventId);
        return view('pages.contentsmanager.event.edit', ['event' => $event]);
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
            'street' => 'required|max:50',
            'start_date' => 'date|after:today',
            'end_date' => 'nullable|date|after:start_date',
        ], [
            'unitno.required' => 'The house/apartment/unit number is required.',
            'bldg.required' => 'The building field is required.'
        ]);


        $eventinfo = $request->except(['_token']);
        $event = Event::find($eventId);


        if ($request->file('eventImage') != null) {
            $eventinfo['image_name'] = $request->file('eventImage')->getClientOriginalName();
            $request->file('eventImage')->storeAs('public', $eventinfo['image_name']);
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
        return redirect('/contentmanager/events/create');

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

    public function usercancels($id)
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

    public function searching(Request $request)
    {

        $events = Event::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);

        return view('pages.member.event.userevent', ['events' => $events]);
    }


    public function destroy($eventId)
    {
        $event = Event::find($eventId);

        if ($event->status == 1) {
            $event->status = 0;
        } else {
            $event->status = 1;
        }

        if ($event->save()) {
            $log = new logs();
            $log->savelog(session('user_id'), 'Changed an event status');
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong :(');
            return redirect()->back();
        }
    }
}



