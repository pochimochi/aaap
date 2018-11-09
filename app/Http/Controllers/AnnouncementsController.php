<?php

namespace App\Http\Controllers;

use App\AnnouncementCategories;
use App\AnnouncementImages;
use App\Announcements;
use Auth;
use App\Helper;
use App\Images;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\logs;
use Illuminate\Support\Facades\Validator;
use App\User;

class AnnouncementsController extends Controller
{


    public function index()
    {
        $announcements = Announcements::all();
        foreach ($announcements as $announcement) {
            if (Carbon::parse($announcement->due_date)->lt(Carbon::now())) {
                $announcement->status = 0;
                $announcement->save();
            }

        }
        if (session('user')) {
            if (session('role') == 3) {
                $announcements = Announcements::paginate(10);
                return view('pages.contentsmanager.announcement.index', ['announcements' => $announcements]);
            } else if (session('role') == 4) {
                $announcements = Announcements::where('status', '=', '1')->paginate(10);;
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
        if(Auth::guest()){
            $announcements = Announcements::where('title', 'LIKE', '%' . $request->search . '%')->where('status', '=', '1')->paginate(5);
            return view('pages.member.announcement.index', ['announcements' => $announcements]);
        }else{
            $announcements = Announcements::where('title', 'LIKE', '%' . $request->search . '%')->where('status', '=', '1')->paginate(5);
            return view('pages.member.announcement.index', ['announcements' => $announcements]);
        }
    }

    public function create()
    {
        $announcements = Announcements::all();
        $categories = AnnouncementCategories::all();
        return view('pages.contentsmanager.announcement.create', compact(['announcements', 'categories']));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:announcements,title,0,status|max:50',
            'description' => 'required|max:1000',
            'type_id' => 'required',
            'due_date' => 'nullable|after:today',
            'announcementImage' => 'nullable',
            'announcementImage.*' => 'image|mimes:jpeg,png,jpg|max:8000'
        ], [
            'type_id.required' => 'The type of the announcement must be specified.',
            'announcementImage.*.image' => 'Uploads must be in image form',
        ]);


        $announcementInfo = $request->all();
        $users = User::all()->where('active', 1)->where('role_id', 4);
        $announcementInfo['title'] = strip_tags($announcementInfo['title']);
        $announcementInfo['description'] = strip_tags($announcementInfo['description']);
        $announcementInfo['status'] = 1;

        $announcementInfo['posted_by'] = session('user')['id'];
        $announcementInfo['announcement_id'] = Announcements::create($announcementInfo)->id;

        if ($request->file('announcementImage') != null) {
            foreach ($request->file('announcementImage') as $name) {
                $announcementInfo['image_name'] = $name->getClientOriginalName();
                $name->storeAs('public', $announcementInfo['image_name']);
                $announcementInfo['image_id'] = Images::create(['location' => $announcementInfo['image_name']])->id;
                AnnouncementImages::create(['image_id' => $announcementInfo['image_id'], 'announcement_id' => $announcementInfo['announcemnent_id']]);
            }

        }
        /*AnnouncementImage::create(['image_id' => $imageId->id, 'announcement_id' => $announcementId->id]);*/

        $helper = new Helper();
        $helper->emailBulk($users, 'We just posted a new announcement entitled "' . $announcementInfo['title'] . '". Visit our <a href=' . url('home') . '>website</a> for more details.', 'New Announcement!');

        $log = new logs();
        $log->savelog(session('user')['id'], 'Added an Announcement');
        alert()->success('Announcement Added!', 'You have successfully added an announcement!');
        return redirect('contentmanager/announcements/create');

    }

    public function edit($id)
    {
        $announcement = Announcements::find($id);
        $categories = AnnouncementCategories::all();
        return view('pages.contentsmanager.announcement.edit', compact(['announcement', 'categories']));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:1000',
            'type_id' => 'required',
            'due_date' => 'nullable|date',
            'announcementImage' => 'nullable',
            'announcementImage.*' => 'image|mimes:jpeg,png,jpg|size:2048'
        ], [
            'type_id.required' => 'The type of the announcement must be specified.',
        ]);


        $announcement = Announcements::find($id);

        if ($request->file('announcementImage') != null) {
            $announcement->image()->detach();
            foreach ($request->file('announcementImage') as $name) {
                $announcementinfo['image_name'] = $name->getClientOriginalName();
                $name->storeAs('public', $announcementinfo['image_name']);
                $announcementinfo['image_id'] = Images::create(['location' => $announcementinfo['image_name']])->id;
                AnnouncementImages::create(['image_id' => $announcementinfo['image_id'], 'announcement_id' => $announcement->id]);
            }


        }

        $announcement->title = $request->get('title');
        $announcement->description = $request->get('description');
        $announcement->modified_by = session('user')['id'];
        $announcement->type_id = $request->get('type_id');
        $announcement->due_date = $request->get('due_date');
        $announcement->save();

        $log = new logs();
        $log->savelog(session('user')['id'], 'Updated an Announcement');
        alert()->success('Announcement Updated!', 'You have successfully updated an announcement!');
        return redirect('/contentmanager/announcements/create');
    }


    public
    function indexSelect($type)
    {
        if ($type == 1) {
            $announcements = Announcements::where('status', '=', 1)->where('type_id', '=', 1)->paginate(10);
        } elseif ($type == 2) {
            $announcements = Announcements::where('status', '=', 1)->where('type_id', '=', 2)->paginate(10);
        } else {
            $announcements = Announcements::where('status', '=', 1)->where('type_id', '=', 1)->paginate(10);
        }
        return view('pages.member.announcement.index', ['announcements' => $announcements]);
    }

    public function changeStatus(Request $request)
    {
        $this->validate($request, [
            'remarks' => 'required|max:500|string',
        ], [
            'remarks.required' => 'You should state a valid reason for archiving this announcement.',
            'remarks.max' => 'The reason must not be greater than 500 characters.',
            'remarks.string' => 'The reason format is invalid.'
        ]);
        $announcements = Announcements::find($request->id);
        $announcements->remarks = $request->remarks;
        $announcements->status = 0;
        if ($announcements->save()) {

            $log = new logs();
            $log->savelog(session('user')['id'], 'Changed an Announcement Status');
            toast('Status Changed!', 'success', 'bottom-left');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong 😞');
            return redirect()->back();
        }
    }
}
