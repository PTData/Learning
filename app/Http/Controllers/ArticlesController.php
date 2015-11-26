<?php

namespace App\Http\Controllers;

use App\Article;
//use Illuminate\Http\Request;

use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Auth;
class ArticlesController extends Controller
{
    function __construct() {
        $this->middleware('auth', ['only' => 'create'] ); // we can attatched from app/http/kernel.php $routeMiddleware;
    }
    public function index() {
        //$articles = Article::all();
        //$articles = Article::latest('publish_at')->get();
        //$articles = Article::latest('publish_at')->where('publish_at', '<=', Carbon::now())->get();
        /* publishit is scoped in Model Controller */
        if(\Auth::user()) {
            print \Auth::user()->name;
        }
        $articles = Article::latest('publish_at')->publishit()->get();
        return view("articles/index", compact('articles'));
    }
    public function show($id){
        // for small projects can use Route Model Binding
        $article = Article::findOrFail($id);
        //dd($article);
        /*if(is_null($article)) {
            abort(404);
        }*/
        $dateFormate = $article->publish_at->diffForHumans();
        return view("articles/show", compact('article', 'dateFormate'));
    }
    
    public function create() {
         return view("articles/create", compact('article'));
    }
    
    public function store(ArticleRequest $request) {
        // validation
         //$input = Request::all();
         //$input = Request::get('body');
        // $input['publish_at'] = Carbon::now();
         //$article = new Article;
         
         $articles = Article::create($request->all());
         
         \Auth::user()->articles()->save($articles);
         //return $input;
         return redirect('articles');
    }
    
    public function edit($param) {
        $article = Article::findOrFail($param);
        return view('articles/edit', compact('article'));
    }
    
    // method injections Request $request
    public function update($id, ArticleRequest $request) {
        // for small projects can use Route Model Binding
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }
}
