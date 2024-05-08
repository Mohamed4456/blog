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
        <h1 class="">Create Tag</h1>

      <a class="btn btn-primary" href="{{route('tag.index')}}"> All Tags</a>

      </div>


<div>
    <form  action="{{ route('tag.store') }}"  method="POST" >
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="exampleFormControlInput1">Tag</label>
          <input type="text"  name="tag" class="form-control" >
        </div>
  
            <button type="submit" class="btn btn-primary">Submit</button>
        
      </form>
</div>



</div>





@endsection

