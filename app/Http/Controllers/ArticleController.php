<?php namespace App\Http\Controllers;

use App\Article;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller {

	public function index(){
		return view('front.index');
	}

	public function showAll(){
		$articles = Article::latest('published_at')->get();


		return view('article.showall', compact('articles', $articles));
	}

	public function create(){
		return view('article.create');
	}

	public function store(Request $request){
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required'
			]);

		$input = $request->all();
		$input['published_at'] = Carbon::now();

		Article::create($input);

		Session::flash('flash_message', 'Article Successfully Added');

		return redirect()->back();
	}

	public function show($id){
		$article = Article::findOrFail($id);

		return view('article.show', compact('article', $article));
	}

	public function edit($id){
		$article = Article::findOrFail($id);

		return view('article.edit', compact('article', $article));
	}

	public function update($id, Request $request){
		$articles = Article::findOrFail($id);

		$this->validate($request, [
			'title' => 'required',
			'body' => 'required'
			]);

		$input = $request->all();

		$articles->fill($input)->save();

		Session::flash('flash_message', 'Article Successfully Added!');

		return redirect('article');
	}

	public function destroy($id){
		$articles = Article::findOrFail($id);

		$articles->delete();

		Session::flash('flash_message', 'Article Successfully Deleted!');

		return redirect('article');


	}
}
