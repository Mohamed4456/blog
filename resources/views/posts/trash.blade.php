@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron">
          <h1 class="display-4">Trashed Posts  </h1>
      <a class="btn btn-primary" href="{{route('post.index')}}"> All post</a>
         </div>
    </div>
  </div>

  <div  class="container" >
    
    @if ($message =Session::get('success'))
            <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
  </div>
    @endif 
    

    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Date</th>
                <th scope="col">image</th>
                <th scope="col">Actions</th>


                
              </tr>
              <tbody>
                @php
                    $i=1;
                @endphp

              @foreach ($post as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->created_at->diffForhumans()}}</td>

                    <td>
                      <img src="{{ URL::asset($item->photo) }}" alt="{{$item->photo}}" width="100"  height="100">
                    </td>

                    <td>
                      <div class="row" >
                      <div class="col-sm"><a class="btn btn-success" href="{{ route('post.restore',$item->id) }}" role="button">Back</a></div>
                      <div class="col-sm"><a class="btn btn-danger" href="{{ route('post.hdelete',$item->id) }}" role="button"> Delete</a></div>

                
                        
                    </td>
                  </tr>
              
              @endforeach
                
                
              </tbody>
            </thead>
            
          </table>

         
   {{$post->links()}}
</div>
       
@endsection