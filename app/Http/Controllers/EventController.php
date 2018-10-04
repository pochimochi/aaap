<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\Event;
use App\EventAttendance;
use App\EventImages;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    public function event()
    {

        $events = DB::select('select * from events');

        return view('pages.contentsmanager.event', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'eventName' => 'required|string|max:100',
            'eventDescription' => 'required|max:500',
            'venue' => 'required|max:50',
            'postedBy' => 'required',
//            'modifiedBy' => 'required', sa update lang to
            'cityId' => 'required',
            'unitno' => 'required|max:5',
            'bldg' => 'required|max:50',
            'street' => 'required|max:50'

        ]);


        $eventinfo = $request->all();
        $cityId = City::create(['name' => $eventinfo['cityId']]);
        ($cityId->cityId);
        $eventinfo['cityId'] = $cityId->cityId;
        $addressid = Address::create($eventinfo);
        $eventinfo['addressId'] = $addressid->addressId;
        $eventid = Event::create($eventinfo);

        $eventImages = $request->file('eventImage')->store('public');
        $imageId = Image::create(['imageLocation' => $eventImages]);

        EventImages::create(['imageId' => $imageId->id, 'eventId' => $eventid->eventId]);


        alert()->success('Event', 'Added');
        return redirect()->back();

    }

    public function edit($eventId)
    {

        $event = Event::find($eventId);
        $address = Address::find($event->addressId);
        $city = City::find($address->cityId);
        return view('pages.contentsmanager.eventedit')
            ->with(compact('event', 'eventId'))
            ->with(compact('address', 'event->addressId'))
            ->with(compact('city', 'address->cityId'));

    }

    public function update(Request $request, $eventId)
    {
        $this->validate($request, [
            'eventName' => 'required|max:100',
            'eventDescription' => 'required|max: 500',
            'venue' => 'required|max:50',
            'modifiedBy' => 'required',
//            'status' => 'required',
            'cityname' => 'required',
            'unitno' => 'required|max:5',
            'bldg' => 'required|max:50',
            'street' => 'required|max:50'
        ]);

        $eventinfo = $request->except(['_token']);

        $cityId = City::where('cityId', $eventinfo['cityId'])
            ->update(['name' => $eventinfo['cityname']]);

        $addressid = Address::where('addressId', $eventinfo['addressId'])
            ->update(['street' => $eventinfo['street'], 'bldg' => $eventinfo['bldg'], 'unitno' => $eventinfo['unitno']]);

        $eventinfo1 = $request->except(['_token', 'street', 'bldg', 'unitno', 'cityname', 'cityId', 'fileToUpload' , 'eventImage']);

        Event::where('eventId', $eventId)
            ->update($eventinfo1);

        alert()->success('Event', 'Updated');
        return redirect()->back();

    }

    public function search(Request $request)
    {
    $search = $request->search;
    $events = DB::table('events')->where('eventName', 'LIKE', '%' . $search . '%')->paginate(10);

        return view('pages.member.event.eventview', ['eventName' => $events]);

    }
    public function userevent(Request $request)
    {

        $events = DB::select('select * from events');

        return view('pages.member.event.userevent', ['events' => $events]);

//        return view('pages.member.event.userevent', ['events' => $events]);
    }

    public function userjoin($eventId)
    {

        $event = Event::find($eventId);
        $address = Address::find($event->addressId);
        $city = City::find($address->cityId);
        return view('pages.member.event.userjoin')
            ->with(compact('event', 'eventId'))
            ->with(compact('address', 'event->addressId'))
            ->with(compact('city', 'address->cityId'));





//        $attendanceinfo = $request->all();
//
//        $userId = User::where(['userId' => $attendanceinfo['userId']]);
//        ($userId->userId);
//        $attendanceinfo['userId'] = $userId->userId;
//        $eventId = Event::where($attendanceinfo);
//        $attendanceinfo['eventId'] = $eventId->eventId;
//        dd($eventId);
//        $attendanceid = EventAttendance::create($attendanceinfo);
//
//        return view('pages.member.event.userevent' ,'Succesfully', 'Joined');

    }

    public function userjoins(Request $request)
    {
        $attendanceinfo = $request->all();

        $userId = User::where(['userId' => $attendanceinfo['userId']]);
        ($userId->userId);
        $attendanceinfo['userId'] = $userId->userId;
        $eventId = Event::where($attendanceinfo);
        $attendanceinfo['eventId'] = $eventId->eventId;
        dd($eventId);
        $attendanceid = EventAttendance::create($attendanceinfo);

        return view('pages.member.event.userevent' ,'Succesfully', 'Joined');
    }

    public function usercancels($attendanceid)
    {
        $attendance = EventAttendance::findorfail($attendanceid);

        $attendance->delete();

        return redirect('member/userevent' , 'You are not Joined in this Event Anymore.');
    }

}
