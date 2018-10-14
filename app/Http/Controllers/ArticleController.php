<?php

namespace App\Http\Controllers;

use App\Articles;
use App\logs;
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
                $articles = Articles::where('status_id', '=', '1')->paginate(6);

                return view('pages.member.article.index', ['articles' => $articles]);
            }
        }else{
            return redirect('/home');
        }
    }
    public function searching(Request $request){

        $articles = Articles::where('title', 'LIKE', '%' . $request->search . '%')->paginate(6);

        return view('pages.member.article.index', ['articles' => $articles]);


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
            'articletype_id' => 'required',
            'body' => 'required',
            'modified_by' => 'nullable|max:70',
            'status_id' => 'nullable|integer',


        ]);
        if ($valid->passes()) {
            $articleinfo = $request->all();
            $articleinfo['posted_by'] = session('user')['id'];
            $articleinfo['modified_by'] = 0;

            Articles::create($articleinfo);
            $log = new logs();
            $log->savelog(session('user')['id'], 'Added an Article');
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
        $article = Articles::find($articleId);

        return view('pages.member.article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($articleId)
    {
        $article = Articles::all()->where('id', $articleId)->first();

        return view('pages.writer.edit', compact('article', 'id'));
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
            'status_id' => 'required'
        ]);

        $articleId = $request->get('id');
        $article = Articles::all()->where('id', '=', $articleId)->first();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->modified_by = session('user')['id'];
        $article->articletype_id = $request->get('articletype_id');
        $article->status_id = $request->get('status_id');
        $article->save();
        $log = new logs();
        $log->savelog(session('user')['id'], 'Updated an Article');
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
            $log = new logs();
            $log->savelog(session('user_id'), 'Changed an article status');
            toast('Status Changed!', 'success', 'bottom-right');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'something went wrong :(');
            return redirect()->back();
        }
    }

}
