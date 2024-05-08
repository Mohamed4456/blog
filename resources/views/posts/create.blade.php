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
        <h1 class="">Create Post</h1>

      <a class="btn btn-primary" href="{{route('post.index')}}"> All post</a>

      </div>


<div>
    <form  action="{{ route('post.store') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text"  name="title" class="form-control" >
        </div>
  
        <div class="form-group">
          
          @foreach ($tag as $item)
          <input type="checkbox"  value="{{ $item->id }}"  name="tag[]"  >
          <label for="exampleFormControlInput1">{{ $item->tag }}</label>
          @endforeach
         
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Content</label>
          <input type="text"  name="content" class="form-control" >
        </div>

        <div>
            <label for="">Image</label>
            <input type="file" name="photo" class="form-control" >

        </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        
      </form>
</div>



</div>





@endsection

