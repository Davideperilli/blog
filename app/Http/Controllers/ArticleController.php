<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->except('index','show');
    }
    public function create(){
        return view('article.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|unique:articles|min:5',
            'subtitle'=>'required|unique:articles|min:5',
            'body'=>'required|min:10',
            'image'=>'image|required',
            'category'=>'required',
            'tags'=>'required',
        ]);
        $article=Article::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'body'=>$request->body,
            'image'=>$request->file('image')->store('public/image'),
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
            'slug'=>Str::slug($request->title),
        ]);
        $tags=explode(', ',$request->tags);

        foreach($tags as $tag){
            $newTag=Tag::updateOrCreate([
                'name'=>$tag,
            ]);
            $article->tags()->attach($newTag);
        }

        return redirect(route('home'))->with('message','articolo creato');

    }
    public function show(Article $article){
        return view('article.show',compact('article'));
    }
    public function index(){
        $articles=Article::where('is_accepted', true)->orderBy('created_at','desc')->get();
        return view('article.index',compact('articles'));
    }

    public function edit(Article $article){
        return view('article.edit', compact('article'));
    }

    public function byCategory(Category $category){
        $articles=$category->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.byCategory',compact('category','articles'));
    }
    public function byUser(User $user){
        $articles=$user->articles->sortByDesc('created_at');
        return view('article.byUser',compact('user','articles'));
    }

    public function byWriter(User $user){
        $articles=$user->articles->sortByDesc('created_at')->filter(function($article){
            return $article->is_accepted == true;
        });
        return view('article.by-user',compact('user','articles'));
    }

    public function articleSearch(Request $request){
        $query = $request->input('query');
        $articles=Article::search($query)->where('is_accepted',true)->orderBy('created_at','desc')->get();

        return view('article.search-index',compact('articles','query'));
    }

    public function update(Request $request, Article $article){
        $request->validate([
            'title'=>'required|min:5|unique:articles,title,' . $article->id,
            'subtitle'=>'required|min:5|unique:articles,subtitle,' . $article->id,
            'body'=>'required|min:10',
            'image'=>'image',
            'category'=>'required',
            'tags'=>'required',
        ]);
        $article->update([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'body'=>$request->body,
            'category_id'=>$request->category,
            'slug'=>Str::slug($request->title),

        ]);
        if($request->image){
            Storage::delete($article->image);
            $article->update([
                'image'=>$request->file('image')->store('public/image'),
            ]);
        }
        $tags=explode(', ',$request->tags);
        $newTags=[];

        foreach($tags as $tag){
            $newTag=Tag::updateOrCreate([
                'name'=>$tag,
            ]);
            $newTags[]=$newTag->id;
           
        }
        $article->tags()->sync($newTags);
        $article->update(['is_accepted'=>NULL]);
        return redirect(route('writer.dashboard'))->with('message','articolo modificato');

    }

    public function destroy(Article $article){
         foreach($article->tags as $tag){
            $article->tags()->detach($tag);
    }
        $article->delete();
        
        return redirect(route('writer.dashboard'))->with('message', 'Articolo eliminato');
    
    }

}
