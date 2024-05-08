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
        <h1 class="">Edit tag :  {{ $tag->tag }}</h1>
        <div>
            <a class="btn btn-primary" href="{{route('tag.index')}}">ALl tags</a>
          </div>
    
      </div>
  

<div>
    <form  action="{{ route('tag.update',$tag->id) }}"  method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleFormControlInput1">Tag Name</label>
          <input type="text"  value="{{ $tag->tag }}"  name="tag" class="form-control" >
        </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        
      </form>
</div>



</div>





@endsection

