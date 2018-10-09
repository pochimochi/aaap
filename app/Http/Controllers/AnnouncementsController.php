<?php

namespace App\Http\Controllers;

use App\Announcements;
use Carbon\Carbon;
use App\AnnouncementImage;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AnnouncementsController extends Controller
{


    public function index()
    {
        $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 1);
        return view('pages.member.announcements.index', ['announcements' => $announcements]);
    }


    public function create()
    {
        $announcements = Announcements::all();
        return view('pages.contentsmanager.announcement', ['announcements' => $announcements]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'posted_by' => 'required'
        ]);

        $announcementInfo = $request->all();
        $announcementId = Announcements::create($announcementInfo);

        $announcementImages = $request->file('announcementImage')->store('public');
        $imageId = Image::create(['location' => $announcementImages]);

        AnnouncementImage::create(['image_id' => $imageId->id, 'announcement_id' => $announcementId->id]);

        alert()->success('Announcement', 'Added');
        return redirect()->back();
    }

    public function edit($id)
    {
        $announcement = Announcements::find($id);

        $imageid = AnnouncementImage::all()->where('announcement_id', $id)->first();
        $imagelocation = Image::all()->where('id', $imageid->image_id)->first();

        $announcement['location'] = $imagelocation->location;
        return view('pages.contentsmanager.announcementedit', compact('announcement', 'id'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'posted_by' => 'required',
            'modified_by' => 'required'
        ]);

        $announcement = Announcements::find($id);
        $input = $request->all();

        $file = $request->file('announcementImage')->getClientOriginalName();
        $request->file('announcementImage')->storeAs('public', $file);

        $imagestore["location"] = $file;
        $image = Image::create($imagestore);

        AnnouncementImage::where('announcement_id', $id)->update(['image_id' => $image->id]);

        $announcement->title = $request->get('title');
        $announcement->description = $request->get('description');
        $announcement->modified_by = $request->get('modified_by');
        $announcement->type_id = $request->get('type_id');
        $announcement->due_date = $request->get('due_date');
        $announcement->save();

        alert()->success('Announcement', 'Updated');
        return redirect('/contentmanager/announcements/create');
    }



    public function indexSelect($type)
    {
        if($type == 1){
            $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 1);
        }elseif($type == 0){
            $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 0);
        }else{
            $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 1);
        }

        return view('pages.member.announcements.index', ['announcements' => $announcements]);
    }

    public function changeStatus($id, $status)
    {
        $announcements = Announcements::find($id);
        $announcements->status_id = $status;
        if ($announcements->save()) {
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }

}
