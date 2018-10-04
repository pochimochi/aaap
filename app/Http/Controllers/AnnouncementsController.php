<?php

namespace App\Http\Controllers;

use App\Announcements;
use DB;
use Carbon\Carbon;
use App\AnnouncementImage;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = DB::table('announcements')->where('statusId', '=', 1)->where('aTypeId', '=', 1)->paginate(5);
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
            'postedBy' => 'required'
        ]);

        $announcementInfo = $request->all();
        $announcementId = Announcements::create($announcementInfo);

        $announcementImages = $request->file('announcementImage')->store('public');
        $imageId = Image::create(['imageLocation' => $announcementImages]);

        AnnouncementImage::create(['imagesId' => $imageId->id, 'announcementId' => $announcementId->announcementId]);

        alert()->success('Announcement', 'Added');
        return redirect()->back();
    }

    public function edit($announcementId)
    {
        $announcement = Announcements::find($announcementId);

        $imageid = AnnouncementImage::all()->where('announcementId', $announcementId)->first();
        $imagelocation = Image::all()->where('imageId', $imageid->imagesId)->first();

        $announcement['imageLocation'] = $imagelocation->imageLocation;
        return view('pages.contentsmanager.announcementedit', compact('announcement', 'announcementId'));
    }


    public function update(Request $request, $announcementId)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'postedBy' => 'required',
            'modifiedBy' => 'required'
        ]);

        $announcement = Announcements::find($announcementId);
        $input = $request->all();

        $file = $request->file('announcementImage')->getClientOriginalName();
        $request->file('announcementImage')->storeAs('/public', $file);

        $imagestore["imageLocation"] = $file;
        $image = Image::create($imagestore);

        AnnouncementImage::where('announcementId', $announcementId)->update(['imagesId' => $image->id]);

        $announcement->title = $request->get('title');
        $announcement->description = $request->get('description');
        $announcement->modifiedBy = $request->get('modifiedBy');
        $announcement->aTypeId = $request->get('aTypeId');
        $announcement->dueDate = $request->get('dueDate');
        $announcement->save();

        alert()->success('Announcement', 'Updated');
        return redirect('/contentmanager/announcements/create');
    }

    public function view()
    {
        $announcements = DB::select('select * from announcements where statusId = 1');
        return view('member.announcement', ['announcements' => $announcements]);
    }

    public function changeStatus($announcementId, $status)
    {
        $announcements = Announcements::find($announcementId);
        $announcements->statusId = $status;
        if ($announcements->save()) {
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }

}
