@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron">
          <h1 class="display-4">All Tags  </h1>
      <a class="btn btn-primary" href="{{route('tag.create')}}"> create Tag</a>
      
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
                <th scope="col">Tag Name</th>
                
                <th scope="col">Date</th>
               
                <th scope="col">Actions</th>


                
              </tr>
              <tbody>
                @php
                    $i=1;
                @endphp

              @foreach ($tag as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->tag}}</td>
                    <td>{{$item->created_at->diffForhumans()}}</td>

                  
                    <td>
                      <div class="row" >
                      <div class="col-sm"><a class="btn btn-primary" href="{{ route('tag.edit',$item->id) }}" role="button">Edit</a></div>

                      <div class="col-sm"><a class="btn btn-danger" href="{{ route('tag.hdelete',$item->id) }}" role="button"> Delete</a></div>

                
            
                    </td>
                  </tr>
              
              @endforeach
                
                
              </tbody>
            </thead>
            
          </table>

         
   {{$tag->links()}}
</div>
       
@endsection