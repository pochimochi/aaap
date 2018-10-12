<?php

namespace App\Http\Controllers;

use App\Announcements;

use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\logs;

class AnnouncementsController extends Controller
{


    public function index()
    {
        $announcements = Announcements::all()
            ->where('status_id', '=', 1)
            ->where('type_id', '=', 1);
//            ->paginate(5);
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
        ]);

        $announcementInfo = $request->all();
        $announcementInfo['status_id'] = 1;
        $file1 = $request->file('announcementImage')->getClientOriginalName();
        $request->file('announcementImage')->storeAs('public', $file1);
        $announcementInfo['image_id'] = Images::create(['location' => $file1])->id;
        $announcementInfo['posted_by'] = session('user')['id'];
        Announcements::create($announcementInfo);
        /*AnnouncementImage::create(['image_id' => $imageId->id, 'announcement_id' => $announcementId->id]);*/

        $log = new logs();
        $log->savelog(session('user')['id'], 'Added an Announcement');
        alert()->success('Announcement', 'Added');
        return redirect('contentmanager/announcements/create');
    }

    public function edit($id)
    {
        $announcement = Announcements::find($id);

        /*$imageid = AnnouncementImage::all()->where('announcement_id', $id)->first();*/
        /*$imagelocation = Image::all()->where('id', $imageid->image_id)->first();*/

        /*$announcement['location'] = $imagelocation->location;*/
        return view('pages.contentsmanager.announcementedit', ['announcement' => $announcement]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $announcement = Announcements::find($id);

        if ($request->file('announcementImage') != null) {
            $file = $request->file('announcementImage')->getClientOriginalName();
            $request->file('announcementImage')->storeAs('public', $file);

            Images::where('id', $announcement->image->id)->update(['location' => $file]);
        }


        /*if ($request->file('announcementImage') != null) {
            $announcement['image_name'] = $request->file('announcementImage')->getClientOriginalName();
            $img = (new \Intervention\Image\ImageManager)->make($request->file('announcementImage'));
            $img->resize(850, 315, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('public/' . $announcement['image_name'] . '', (string)$img->encode());
            $announcement['image_id'] = Images::create(['location' => $announcement['image_name']])->id;
//            Images::create(['id' => $announcement['image_id'], 'announcement_id' => $id]);
        }*/


        $announcement->title = $request->get('title');
        $announcement->description = $request->get('description');
        $announcement->modified_by = session('user')['id'];
        $announcement->type_id = $request->get('type_id');
        $announcement->due_date = $request->get('due_date');
        $announcement->save();

        $log = new logs();
        $log->savelog(session('user')['id'], 'Updated an Announcement');
        alert()->success('Announcement', 'Updated');
        return redirect('/contentmanager/announcements/create');
    }


    public function indexSelect($type)
    {
        if ($type == 1) {
            $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 1);
        } elseif ($type == 0) {
            $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 0);
        } else {
            $announcements = Announcements::all()->where('status_id', '=', 1)->where('type_id', '=', 1);
        }

        return view('pages.member.announcements.index', ['announcements' => $announcements]);
    }

    public function changeStatus($id, $status)
    {
        $announcements = Announcements::find($id);
        $announcements->status_id = $status;
        if ($announcements->save()) {
            $log = new logs();
            $log->savelog(session('user')['id'], 'Changed an Announcement Status');
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }
}
