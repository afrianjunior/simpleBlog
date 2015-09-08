<?php namespace App\Http\Controllers;

use Auth;
use App\Article;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPageController extends Controller {

	public function index(){
		if(Auth::check()){
			return view('admin.index');	
		}else{
			return view('front.index');
		}		
	}

	// Lihat Semua Artikel Pada Halaman Admin
	public function showall(){
		if(Auth::check()){
			$articles = Article::latest('published_at')->get();
			return view('admin.showall', compact('articles', $articles));
		}else{
			return redirect('/');
		}
	}

	// Lihat Artikel/Judul Pada Halaman Admin
	public function show($id){
		if(Auth::check()){
			$article = Article::findOrfail($id);
			return view('admin.show', compact('article'));
		}else{
			return redirect('/');
		}
	}

	public function create(){
		if(Auth::check()){
			return view('admin.create');
		}else{
			return redirect('/');
		}

	}

	public function store(Request $request){
		if(Auth::check()){
			$this->validate($request, [
				'title' => 'required',
				'body' => 'required'
			]);

			$input = $request->all();
			$input['published_at'] = Carbon::now();

			Article::create($input);

			return redirect('admin/article')->with('flash_message', 'Article Succesfully Added!');
		}else{
			return redirect('/');	
		}
		
	}

	public function edit($id){
		if(Auth::check()){
			$article = Article::findOrfail($id);
			return view('admin.edit', compact('article'));
		}else{
			return redirect('/');
		}
	}

	public function update($id, Request $request){
		if(Auth::check()){
			$article = Article::findOrfail($id);

			$this->validate($request, [
				'title' => 'required',
				'body' => 'required'
				]);

			$article->fill($request->all())->save();

			return redirect('admin/article')->with('flash_message', 'Article Succesfully Updated ');
		}else{
			return redirect('/');
		}
		
	}

	public function destroy($id){
		$article = Article::findOrfail($id);

		$article->delete();

		return redirect('admin/article')->with('flash_message', 'Article Succesfully Deleted!');
	}

}
