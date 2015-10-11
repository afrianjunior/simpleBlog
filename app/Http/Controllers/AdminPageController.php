<?php namespace App\Http\Controllers;

use Auth;
use App\Article;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPageController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){	
		return view('admin.index');				
	}

	// Lihat Semua Artikel Pada Halaman Admin
	public function showall(){		
		$articles = Article::latest('published_at')->get();
		return view('admin.showall', compact('articles', $articles));		
	}

	// Lihat Artikel/Judul Pada Halaman Admin
	public function show($id){
		$article = Article::findOrfail($id);
		return view('admin.show', compact('article'));		
	}

	public function create(){
		return view('admin.create');	
	}

	public function store(Request $request){		
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required'
		]);

		$input = $request->all();
		$input['published_at'] = Carbon::now();

		Article::create($input);

		return redirect('admin/article')->with('flash_message', 'Article Succesfully Added!');				
	}

	public function edit($id){
		$article = Article::findOrfail($id);
		return view('admin.edit', compact('article'));	
	}

	public function update($id, Request $request){		
		$article = Article::findOrfail($id);

		$this->validate($request, [
			'title' => 'required',
			'body' => 'required'
			]);

		$article->fill($request->all())->save();

		return redirect('admin/article')->with('flash_message', 'Article Succesfully Updated ');		
		
	}

	public function destroy($id){
		$article = Article::findOrfail($id);

		$article->delete();

		return redirect('admin/article')->with('flash_message', 'Article Succesfully Deleted!');
	}

}
