<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditLogController extends Controller
{
   public function index(){
       $auditlog = \App\AuditLog::all();


       return view('pages.admin.auditlog', ['auditlog' => $auditlog]);
   }
}
