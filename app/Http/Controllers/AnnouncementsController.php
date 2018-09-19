<?php

namespace App\Http\Controllers;
use App\Announcements;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function announcement()
    {
        $announcements = DB::select('select * from announcements');
        return view('writer.announcement', ['announcements'=>$announcements]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'postedBy' => 'required'
        ]);

        $announcementInfo = $request->all();
        Announcements::create($announcementInfo);

        return redirect()->back();
    }

    public function show(Request $request)
    {

    }

    public function edit($announcementId)
    {
        $announcement = Announcements::find($announcementId);
        return view('writer.announcementedit',compact('announcement','announcementId'));
    }


    public function update(Request $request, $announcementId)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'postedBy' => 'required',
            'modifiedBy' => 'required'
        ]);

        $announcement= Announcements::find($announcementId);
        $announcement->title=$request->get('title');
        $announcement->description=$request->get('description');
        $announcement->postedBy=$request->get('postedBy');
        $announcement->modifiedBy=$request->get('modifiedBy');
        $announcement->aTypeId=$request->get('aTypeId');
        $announcement->statusId=$request->get('statusId');
        $announcement->dueDate=$request->get('dueDate');
        $announcement->save();
        return redirect('announcement');
    }

}
