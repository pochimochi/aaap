<?php

namespace App\Http\Controllers;

use App\ArticleImages;
use App\Articles;
use App\Helper;
use App\Images;
use App\logs;
use App\User;
use Carbon\Carbon;
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
        $articles = Articles::all();
        foreach ($articles as $article) {
            if (Carbon::parse($article->due_date)->lt(Carbon::now())) {
                $article->status = 0;
                $article->save();
            }
        }
        if (session('user')) {
            if (session('role') == 2) {
                $articles = Articles::all();
                return view('pages.writer.create', ['articles' => $articles]);
            } else {
                $articles = Articles::where('status', '=', '1')->paginate(6);
                return view('pages.member.article.index', ['articles' => $articles]);
            }
        } else {
            $articles = Articles::where('status', '=', '1')->paginate(6);
            return view('pages.member.article.index', ['articles' => $articles]);
        }
    }

    public function archived()
    {
        $articles = Articles::where('status', 0)->orderBy('created_at')->paginate(6);
        return view('pages.member.article.index', ['articles' => $articles]);
    }

    public function searching(Request $request)
    {
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

        ], [
            'articletype_id' => 'The article type must be specified.'
        ]);
        if ($valid->passes()) {
            $articleinfo = $request->all();
            $users = User::all()->where('active', 1)->where('role_id', 4);
            $articleinfo['posted_by'] = session('user')['id'];
            $articleinfo['due_date'] = Carbon::now()->addYear(1);
            $articleinfo['status'] = 1;
            $articleinfo['article_id'] = Articles::create($articleinfo)->id;

            if ($request->file('articleImage') != null) {
                foreach($request->file('articleImage') as $name){
                    $articleinfo['image_name'] = $name->getClientOriginalName();
                    $name->storeAs('public', $articleinfo['image_name']);
                    $articleinfo['image_id'] = Images::create(['location' => $articleinfo['image_name']])->id;
                    ArticleImages::create(['image_id' => $articleinfo['image_id'], 'article_id' => $articleinfo['article_id']]);
                }

            }


            $helper = new Helper();
            $helper->emailBulk($users, 'Read our new article entitled '.$articleinfo['title'].' Visit our <a href='.url('home').'>website</a> for more details.', 'New Article!');
            $log = new logs();
            $log->savelog(session('user')['id'], 'Added an Article');
            alert()->success('Article Added!', 'You have successfully added an article!');
            return redirect('/writer/articles/create');
        } else {
            alert()->error('Add Failed!', 'Some fields are missing.');
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
        if (session('user')) {
            if (session('role') == 2) {
                return view('pages.writer.show', ['article' => $article]);
            } else {
                return view('pages.member.article.show', ['article' => $article]);
            }
        } else {
            return redirect('/home');
        }
    }

    public function changeStatus(Request $request)
    {

        $article = Articles::find($request->id);

        $article->remarks = $request->remarks;
        $article->status = 0;
        if ($article->save()) {

            $log = new logs();
            $log->savelog(session('user')['id'], 'Changed an Article Status');
            toast('Status Changed!', 'success', 'bottom-left');
            return redirect()->back();
        } else {
            alert()->error('Oops!', 'Something went wrong 😞');
            return redirect()->back();
        }
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
            'status' => 'required'
        ]);
        $articleId = $request->get('id');
        $article = Articles::all()->where('id', '=', $articleId)->first();
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->modified_by = session('user')['id'];
        $article->articletype_id = $request->get('articletype_id');
        $article->status = $request->get('status');

        if ($request->file('articleImage') != null) {
            $article->image()->detach();
            foreach($request->file('articleImage') as $name){
                $articleinfo['image_name'] = $name->getClientOriginalName();
                $name->storeAs('public', $articleinfo['image_name']);
                $articleinfo['image_id'] = Images::create(['location' => $articleinfo['image_name']])->id;
                ArticleImages::create(['image_id' => $articleinfo['image_id'], 'article_id' => $article->id]);
            }

        }

        $article->save();
        $log = new logs();
        $log->savelog(session('user')['id'], 'Updated an Article');
        alert()->success('Article Updated!', 'You have successfully updated an article!');
        return redirect('writer/articles/create');
    }


}
