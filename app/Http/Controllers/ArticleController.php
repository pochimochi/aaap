<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('user')){
            if(session('role') == 2){
                $articles = Articles::all();
                return view('pages.writer.create', ['articles' => $articles]);
            }else{
                $articles = Articles::all()->where('statusId', '=', '1');
                return view('pages.member.article.index', ['articles' => $articles]);
            }
        }else{
            return redirect('/home');
        }




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Articles::all();
        return view('pages.writer.create', ['articles' => $articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'articleTypeId' => 'required',
            'body' => 'required',
            'modifiedBy' => 'nullable|max:70',
            'statusId' => 'nullable|integer',


        ]);
        if ($valid->passes()) {
            $articleinfo = $request->all();
            $articleinfo['postedBy'] = session('user')->userId;
            $articleinfo['modifiedBy'] = 0;

            Articles::create($articleinfo);
            alert()->success('Article Added!', 'You have successfully added an article!');
            return redirect('/writer/articles/create');
        } else {
            alert()->error('Add Failed!', 'There were errors in your form.');
            return redirect('/writer/articles/create')->withErrors($valid);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($articleId)
    {
        $article = Articles::all()->where('articleId', $articleId)->first();

        return view('pages.member.article.show', compact('article', 'articleId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($articleId)
    {
        $article = Articles::all()->where('articleId', $articleId)->first();

        return view('pages.writer.edit', compact('article', 'articleId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articleId)
    {
        $this->validate($request, [
            'title' => 'required',
            'statusId' => 'required'
        ]);

        $articleId = $request->get('articleId');
        $article = Articles::all()->where('articleId', '=', $articleId)->first();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->modifiedBy = session('user')->userId;
        $article->articleTypeId = $request->get('articleTypeId');
        $article->statusId = $request->get('statusId');
        $article->save();
        alert()->success('Article Updated!', 'You have successfully updated an article!');
        return redirect('writer/articles/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($articleId)
    {
        $article = Articles::find($articleId);

        if ($article->statusId == 1) {
            $article->statusId = 0;
        } else {
            $article->statusId = 1;
        }

        if ($article->save()) {
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong :(');
            return redirect()->back();
        }
    }

}
