<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Event;
use App\EventAttendance;
use App\EventCategories;
use App\EventImages;
use App\Helper;
use App\Images;
use App\logs;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
                $categories = EventCategories::all();
                return view('pages.contentsmanager.event.create', compact(['events', 'categories']));
            } else if (session('role') == 4) {
                $events = Event::where('status', '=', '1')->paginate(10);
                return view('pages.member.event.index', ['events' => $events]);
            }
        } else {
            $events = Event::where('status', '=', '1')->paginate(10);
            return view('pages.member.event.index', ['events' => $events]);

        }
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
        $categories = EventCategories::all();

        return view('pages.contentsmanager.event.create', compact(['events', 'categories']));
    }

    public function store(Request $request)
    {



        $valid = Validator::make($request->all(), [
            'name' => 'required|unique:events,name,'. '0' .',status|string|max:100',
            'description' => 'required|max:500',
            'venue' => 'required|max:50',
            'city' => 'required|max:50',
            'unitno' => 'required|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'bldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'street' => 'required|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'start_date' => 'date|after:today',
            'end_date' => 'nullable|date|after:start_date',
        ], [
            'unitno.required' => 'The house/apartment/unit number is required.',
            'unitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'bldg.regex' => 'The building format is invalid.',
            'bldg.max' => 'The building may not be greater than 50 characters.',
            'street.regex' => 'The street format is invalid.',
            'street.max' => 'The street may not be greater than 50 characters.',
            'city.regex' => 'The city format is invalid.',
            'city.max' => 'The city may not be greater than 50 characters.',
        ]);
        if ($valid->passes()) {
            $eventinfo = $request->all();
            $event = new Event($eventinfo);
            $users = User::all()->where('active', 1)->where('role_id', 4);
            $eventinfo['city_id'] = City::create(['name' => $eventinfo['city']])->id;
            $eventinfo['address_id'] = Address::create($eventinfo)->id;
            $eventinfo['posted_by'] = session('user')['id'];
            $eventinfo['status'] = 1;

            $eventinfo['event_id'] = Event::create($eventinfo)->id;

            if ($request->file('eventImage') != null) {
                foreach($request->file('eventImage') as $name){
                    $eventinfo['image_name'] = $name->getClientOriginalName();
                    $name->storeAs('public', $eventinfo['image_name']);
                    $eventinfo['image_id'] = Images::create(['location' => $eventinfo['image_name']])->id;
                    EventImages::create(['image_id' => $eventinfo['image_id'], 'event_id' => $eventinfo['event_id']]);
                }

            }

            $helper = new Helper();
            $helper->emailBulk($users, 'Join us in '.$eventinfo['name'].' on '.$eventinfo['start_date']. ' to '. $eventinfo['end_date'] .' at ' . $eventinfo['venue'] .'<br>Visit our <a href='.url('home').'>website</a> for more details', $eventinfo['name']);
            $log = new logs();
            $log->savelog(session('user')['id'], 'Added an Event');
            alert()->success('Event Added!', 'You have successfully added an event!');
            return redirect('contentmanager/events/create');
        } else {
            alert()->error('Add Failed!', 'Some fields are missing.');
            return redirect('contentmanager/events/create')->withErrors($valid);
        }
    }

    public function edit($eventId)
    {
        $event = Event::find($eventId);
        $categories = EventCategories::all();
        return view('pages.contentsmanager.event.edit', compact(['event', 'categories']));
    }

    public function update(Request $request, $eventId)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|max: 500',
            'venue' => 'required|max:50',
            'unitno' => 'required|max:5|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'bldg' => 'nullable|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'street' => 'required|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'city' => 'required|string|max:50|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'start_date' => 'date',
            'end_date' => 'nullable|date',
        ], [
            'unitno.required' => 'The house/apartment/unit number is required.',
            'unitno.max' => 'The house/apartment/unit number may not be greater than 5 characters.',
            'unitno.regex' => 'The house/apartment/unit number format is invalid.',
            'bldg.regex' => 'The building format is invalid.',
            'bldg.max' => 'The building may not be greater than 50 characters.',
            'street.regex' => 'The street format is invalid.',
            'street.max' => 'The street may not be greater than 50 characters.',
            'city.regex' => 'The city format is invalid.',
            'city.max' => 'The city may not be greater than 50 characters.',
        ]);
        $eventinfo = $request->except(['_token', '_method']);
        $event = Event::find($eventId);
        if ($request->file('eventImage') != null) {
            $event->image()->detach();
            foreach($request->file('eventImage') as $name){
                $eventinfo['image_name'] = $name->getClientOriginalName();
                $name->storeAs('public', $eventinfo['image_name']);
                $eventinfo['image_id'] = Images::create(['location' => $eventinfo['image_name']])->id;
                EventImages::create(['image_id' => $eventinfo['image_id'], 'event_id' => $event->id]);
            }


        }
        City::where('id', $event->address->city->id)
            ->update(['name' => $eventinfo['city']]);
        Address::where('id', $event->address->id)
            ->update(['street' => $eventinfo['street'], 'bldg' => $eventinfo['bldg'], 'unitno' => $eventinfo['unitno']]);
        $eventinfo['modified_by'] = session('user')['id'];
        $eventinfo = $request->except(['_token','_method', 'street', 'bldg', 'eventImage', 'unitno', 'city', 'city_id', 'fileToUpload', 'event_image']);
        Event::where('id', $eventId)
            ->update($eventinfo);
        $log = new logs();
        $log->savelog(session('user')['id'], 'Updated an Event');
        alert()->success('Event Updated!', 'You have successfully updated an event!');
        return redirect('/contentmanager/events/create');
    }

    public function changeStatus(Request $request)
    {
        $event = Event::find($request->id);
        $event->remarks = $request->remarks;
        $event->status = 0;
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

    public function reminder(Request $request)
    {
        $user = User::all()->where('active', 1)->where('role_id', 4);
        $request->validate([
            'subject' => 'required|max:70',
            'body' => 'required'
        ]);
        $helper = new Helper();


        foreach ($user as $receiver) {
            $helper->emailSend($receiver->email, $request->body, $request->subject);
            $log = new logs();
            $log->savelog(session('user')['id'], 'Sent an Event Reminder [' . $request->subject . ']');
            alert()->success('Success!', 'Event Reminders has been sent!');
            return back();
        }


    }

    public function searching(Request $request)
    {
        if(Auth::guest()){
            $events = Event::where('name', 'LIKE', '%' . $request->search . '%')->where('status', 1)->paginate(10);
            return view('pages.member.event.index', ['events' => $events]);
        }else{
            $events = Event::where('name', 'LIKE', '%' . $request->search . '%')->where('status', 1)->paginate(10);
            return view('pages.member.event.index', ['events' => $events]);
        }

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
            $log->savelog(session('user_id'), 'Changed an Event Status');
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong :(');
            return redirect()->back();
        }
    }
}
