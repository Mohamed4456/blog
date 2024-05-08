@extends('layouts.app')

@section('content')

@php
    $genderArray=['Male','Female'];
    $provinceArray=['Gharbia','Daqhlia','Sharqia','cairo'];

@endphp

<div class="container" style="padding-top: 3%">

    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}}
      </div>
    @endforeach

    @endif




<div class="container" >
    <form  action="{{ route('profile.update') }}" method="POST"   >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control"  name="name"  value="{{ $user->name }}"  >
          </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Facebook</label>
          <input type="text" class="form-control"  name="facebook"  value="{{ $user->profile->facebook }}"  >
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Gender</label>
          <select class="form-control" name="gender"  >
            @foreach ($genderArray as $item)
                <option value="{{ $item }}"{{ ($user->profile->gender==$item) ? 'selected':'' }} >{{$item}}</option>
            @endforeach
          </select>
        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Province</label>
            <select class="form-control" name="province"  >
              @foreach ($provinceArray as $item)
                  <option value="{{ $item }}"{{ ($user->profile->province==$item) ? 'selected':'' }} >{{$item}}</option>
              @endforeach
            </select>
        <div class="form-group">
            <label for="exampleFormControlInput1">Bio</label>
            <input type="text" class="form-control"  name="bio"  value="{{ $user->profile->bio }}"  >
          </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="text" class="form-control"  name="password"   >
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Confirm Password</label>
            <input type="text" class="form-control"  name="c_password"   >
          </div>


        <div class="form-group">
            <button class="btn btn-success"  type="submit" >Update</button>
          </div>
      </form>



</div>


@endsection