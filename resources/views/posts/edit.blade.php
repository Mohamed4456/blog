@extends('layouts.app')

@section('content')

<div class="container">

    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}}
      </div>
    @endforeach
    @endif

    @if ($message=Session::get('success'))
    <div class="alert alert-primary" role="alert">
    {{$message}}
    </div>
    @endif


<div class="container" >
    <div class="jumbotron">
        <h1 class="">Edit Post :  {{ $post->title }}</h1>
        <div>
            <a class="btn btn-primary" href="{{route('post.index')}}">ALl posts</a>
          </div>
    
      </div>
  

<div>
    <form  action="{{ route('post.update',$post->id) }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text"  value="{{ $post->title }}"  name="title" class="form-control" >
        </div>
        
        <div class="form-group">
          
          @foreach ($tag as $item)
          <input type="checkbox"  value="{{ $item->id }}"  name="tag[]" 
          
          @foreach ($post->tag as $item2)
              @if ($item->id == $item2->id)
                  checked
              @endif
          @endforeach
          
          >
          <label for="">{{ $item->tag }}</label>
          @endforeach
        
        </div>

  
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <input type="text"  value="{{ $post->content }}" name="content" class="form-control" >
        </div>

        <div>
            <label for="">Image</label>
            <input type="file"   value="{{ $post->photo }}" name="photo" class="form-control" >

        </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        
      </form>
</div>



</div>





@endsection

