<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\tag;
use Illuminate\Http\Request;


class TagController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
  
      public function index()
      {
          $tag=tag::latest()->paginate(10);
          return view('tags.index')->with('tag',$tag);
      }
    

      public function create()
      {
          return view('tags.create');
      }
  
    
      public function store(Request $request)
      {
          $this->validate($request,[
              'tag'=>'required',
             
          ]);

          $tag=tag::create([
              'user_id'=>Auth:: id(),
              'tag'=>$request->tag ,
          ]);
          return redirect()->back()->with('success','tag crested success');
  
      }
  
      public function show($slug)
      {
          $tag=tag::where('slug',$slug)->first();
          return view('tags.show')->with('tag',$tag);
  
      }
  
  
      public function edit($id)
      {
          $tag=tag::find($id);
          return view('tags.edit')->with('tag',$tag);
      }
  
  
      public function update(Request $request, $id)
      {
          $tag=tag::find($id);
          $this->validate($request,[
              'tag'=>'required',
              
          ]);
         
          
              $tag->tag = $request->tag ;
        
              $tag->save();
      
         return redirect()->back()->with('success','tag Updated success');;
      }
  
     
      public function hdelete($id)
      {
          $tag=tag::find($id)->delete();
          return redirect()->back()->with('success','tag Deleted success');
      }
  

}
