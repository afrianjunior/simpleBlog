<?php namespace App\Http\Controllers;

use Auth;
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

	// Lihat Semua Artikel Pada Halaman Tamu
	public function showAll(){
		$articles = Article::latest('published_at')->get();

		return view('article.showall', compact('articles', $articles));
	}

	// Lihat Artikel/Judul Pada Halaman Tamu
	public function show($id){
		$article = Article::findOrFail($id);

		return view('article.show', compact('article'));
	}
	
	public function create(){

		// harus login dulu
		if(Auth::check()){
			return view('article.create');	
		}else{
			return redirect('/auth/login');
		}
	}

	public function store(Request $request){
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required'
		]);

		$input = $request->all();
		$input['published_at'] = Carbon::now();

		Article::create($input);

		return redirect('article')->with('flash_message', 'Article Successfully Added');
	}



	public function edit($id){
		$article = Article::findOrFail($id);

		return view('article.edit', compact('article'));
	}

	public function update($id, Request $request){
		$articles = Article::findOrFail($id);

		$this->validate($request, [
			'title' => 'required',
			'body' => 'required'
		]);

		$articles->fill($request->all())->save();

		return redirect('article')->with('flash_message', 'Article Successfully Updated!');;
	}

	public function destroy($id){
		$articles = Article::findOrFail($id);

		$articles->delete();

		return redirect('article')->with('flash_message', 'Article Successfully Deleted!');;
	}

}
