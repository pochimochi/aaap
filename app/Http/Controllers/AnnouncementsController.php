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
        if (session('user')) {
            if (session('role') == 3) {
                $announcements = Announcements::paginate(10);
                return view('pages.contentsmanager.announcement.index', ['announcements' => $announcements]);
            } else if (session('role') == 4) {
                $announcements = Announcements::where('status_id', '=', '1')->paginate(10);;
                return view('pages.member.announcement.index', ['announcements' => $announcements]);
            }
        } else {
            return redirect('/home');
        }
    }

    public function show($id)
    {

        if (session('user')) {
            if (session('role') == 3) {
                $announcement = Announcements::where('id', $id)->first();
                return view('pages.contentsmanager.announcement.show', compact('announcement', 'id'));
            } else if (session('role') == 4) {
                $announcement = Announcements::where('id', $id)->first();
                return view('pages.member.announcement.show', compact('announcement', 'id'));
            }
        } else {
            return redirect('/home');
        }

    }

    public function searching(Request $request)
    {
        $announcements = Announcements::where('title', 'LIKE', '%' . $request->search . '%')->where('status_id', '=', '1')->paginate(5);
        return view('pages.member.announcement.index', ['announcements' => $announcements]);
    }

    public function create()
    {
        $announcements = Announcements::all();
        return view('pages.contentsmanager.announcement.create', ['announcements' => $announcements]);
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
        return view('pages.contentsmanager.announcement.edit', ['announcement' => $announcement]);
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
            $announcements = Announcements::where('status_id', '=', 1)->where('type_id', '=', 1)->paginate(10);
        } elseif ($type == 0) {
            $announcements = Announcements::where('status_id', '=', 1)->where('type_id', '=', 0)->paginate(10);
        } else {
            $announcements = Announcements::where('status_id', '=', 1)->where('type_id', '=', 1)->paginate(10);
        }
        return view('pages.member.announcement.index', ['announcements' => $announcements]);
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
