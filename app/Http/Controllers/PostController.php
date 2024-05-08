<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;  /** slug library */
use App\Models\Tag;

class PostController extends Controller
{
    /** بتتاكد ان اليوزر عامل لوج ان */
  public function __construct()
  {
    $this->middleware('auth');
  }


    public function index()
    {
        $post=Post::latest()->paginate(10);
        return view('posts.index')->with('post',$post);
    }

    public function trash()
    {
        $post=Post::onlyTrashed()->latest()->paginate(10);
        return view('posts.trash')->with('post',$post);
    }




    public function create()
    {

        $tag=Tag::all();
        if($tag->count() ==0)
        {
            return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tag',$tag);
    }

  
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'tag'=>'required',
            'photo'=>'required|image'
        ]);

        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/posts/',$newPhoto);

        $post=Post::create([
            'user_id'=>Auth:: id(),
            'title'=>$request->title ,
            'content'=>$request->content ,
            'photo'=>'uploads/posts/'.$newPhoto,
            'slug'=> Str::slug($request->title ),
        ]);

        $post->tag()->attach($request->tag);
        return redirect()->back()->with('success','post crested success');

    }

    public function show($slug)
    {
        $tag=Tag::all();
        $post=Post::where('slug',$slug)->first();
        return view('posts.show')->with('post',$post)
        ->with('tag',$tag);
        

    }


    public function edit($id)
    {
        $post=Post::find($id);
        $tag=Tag::all();
        return view('posts.edit')->with('post',$post)
        ->with('tag',$tag);
    }


    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            
        ]);
        if($request->has('photo')){

        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/posts/',$newPhoto);
        $post->photo='uploads/posts/'.$newPhoto;
        }
        
            $post->title = $request->title ;
            $post->content = $request->content ;
            $post->save();
            $post->tag()->sync($request->tag);
    
       return redirect()->back()->with('success','post Updated success');;
    }

   
    public function softDelete($id)
    {
        $post=Post::find($id)->delete();
        return redirect()->back()->with('success','post Deleted success');
    }


    public function hdelete($id)
    {
        $post=Post::onlyTrashed()->where('id',$id)->first()->forceDelete();
        return redirect()->back()->with('success','post Hard Deleted success');
    }
    public function restore($id)
    {
        $post=Post::onlyTrashed()->where('id',$id)->first()->restore();
        return redirect()->back()->with('success','post restored success');
    }


}
