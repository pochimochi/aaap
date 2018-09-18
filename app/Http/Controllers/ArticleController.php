<?php

namespace App\Http\Controllers;

use App\Articles;
use App\ArticleType;
use App\ArticleImage;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article(){
        return view('pages.admin.event');
    }

    public function store(Request $request)
    {
        $articleinfo = $request->all();

        /*$articletypeid = ArticleType::create($articleinfo);
        $articleinfo['articleTypeId'] = $articletypeid->id;*/
        Articles::create($articleinfo);



        return 'You have successfully created an Article!';


    }
}
