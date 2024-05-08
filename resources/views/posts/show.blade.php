@extends('layouts.app')

@section('content')



<div class="container"  style="width: 18rem;"  style="height: 50%">
    <div class="row">
      <div class="col">
    </div>
    <div class="row">


      <div class="col">

        <div class="card"  >
            <img src="{{URL::asset($post->photo)}}" class="card-img-top" alt="{{$post->photo}}">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              <p class="card-text"> {{$post->content}}</p>
            <p> Created at:   {{$post->created_at->diffForhumans() }}</p>
            <p>  Updated at:    {{$post->updated_at->diffForhumans() }}</p>

              @foreach ($tag as $item)
                  <label for=""> {{$item->tag}} </label>-
              @endforeach



              <a class="btn btn-success" href="{{route('post.index')}}"> all posts</a>
            </div>
          </div>

      </div>
    </div>
  </div>




@endsection

