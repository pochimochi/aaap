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
    public function announcement()
    {
        $announcements = DB::select('select * from announcements');
        return view('contentsmanager.announcement', ['announcements' => $announcements]);
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

    public function show(Request $request)
    {

    }

    public function edit($announcementId)
    {
        $announcement = Announcements::find($announcementId);
        return view('contentsmanager.announcementedit', compact('announcement', 'announcementId'));
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

//        $path = Storage::putFile('img/uploads', $input["announcementImage"]);
//        $imagestore["imageLocation"] = $path;
//        $image = Image::create($imagestore);
//
//        AnnouncementImage::where('announcementId', $announcementId)->update(['imagesId' => $image->id]);

        $announcement->title = $request->get('title');
        $announcement->description = $request->get('description');
        $announcement->modifiedBy = $request->get('modifiedBy');
        $announcement->aTypeId = $request->get('aTypeId');
        $announcement->statusId = $request->get('statusId');
        $announcement->dueDate = $request->get('dueDate');
        $announcement->save();

        alert()->success('Announcement', 'Updated');
        return redirect('announcement');
    }


}
