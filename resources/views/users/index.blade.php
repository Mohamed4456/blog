@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
      <div class="jumbotron">
          <h1 class="display-4">All Users  </h1>
      <a class="btn btn-primary" href="{{route('user.create')}}"> create User</a>
     
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
                <th scope="col">User Name </th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>


                
              </tr>
              <tbody>
                @php
                    $i=1;
                @endphp

              @foreach ($user as $item)
                  <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                  

                    <td>
                      <div class="row" >
                      <div class="col-sm"><a class="btn btn-danger" href="{{ route('user.hdelete',$item->id) }}"  role="button"> Delete</a></div>

                
                        
                    </td>
                  </tr>
              
              @endforeach
                
                
              </tbody>
            </thead>
            
          </table>

         

</div>
       
@endsection