<?php

namespace App\Http\Controllers;

use App\Articles;
use App\ArticleType;
use App\ArticleImage;
use http\QueryString;
use Illuminate\Http\Request;
use DB;

class ArticleController extends Controller
{
    public function article(){
        $articles = DB::select('select * from articles');
        return view('writer.article', ['articles'=>$articles]);
    }

    public function store(Request $request)
    {
        $articleinfo = $request->all();
        Articles::create($articleinfo);

        return 'You have successfully created an Article!';

        /*$articletypeid = ArticleType::create($articleinfo);
        $articleinfo['articleTypeId'] = $articletypeid->id;*/

    }

    public function edit($articleId)
    {
        $article = Articles::all()->where('articleId',$articleId)->first();
        return view('writer.articleedit',compact('article','articleId'));
    }

    public function update(Request $request, $articleId)
    {
        $this->validate($request, [
            'title' => 'required',
            'modifiedBy' => 'required',
            'statusId' => 'required'
        ]);

        $article= Articles::all()->where('articleId',$articleId)->first();
        $article->title=$request->get('title');
        $article->body=$request->get('body');
        $article->modifiedBy=$request->get('modifiedBy');
        $article->articleTypeId=$request->get('articleTypeId');
        $article->statusId=$request->get('statusId');
        $article->save();
        return redirect('article');
    }
}
