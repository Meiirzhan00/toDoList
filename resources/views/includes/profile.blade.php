@extends('layouts.main')

@section('title','Profile')

@section('content')
    <div class="container" style="font-family: Gilroy;">
        <div class="col-sm-8 ">
            <div class="row mt-4">
                <div class="col-sm-5">
                    <div class="card" style="width: 18rem; font-family: Montserrat;">
                        <img src="/images/profile_image/{{$user->avatar}}" class="card-img-top" alt="..." width="200px" height="300px">
                        <div class="card-body">
                            <h5 class="card-title">{{auth()->user()->full_name}}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <img src="/images/profile.png" width="30" height="25">
                                <strong><a class="nav-link d-inline" href="{{route('profile',auth()->user()->full_name)}}">My Profile</a></strong>
                            </li>
                            <li class="list-group-item">
                                <img src="/images/settings.png" width="30" height="27">
                                <strong><a class="nav-link d-inline" href="{{route('settings',auth()->user()->full_name)}}">Settings</a></strong>
                            </li>
                            <li class="list-group-item">
                                <img src="/images/logout.png" width="27" height="24">
                                <strong class="ml-1"><a class="nav-link d-inline" href="{{route('user.logout')}}">Logout</a></strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 offset-sm-2 col-md-6 offset-md-0">
                    <div class="form-group">
                        <div>
                            <label style="font-size: 24px;color: rgb(247,89,89);">Full Name:</label>
                        </div>
                        <div class="mt-1">
                            <h4>{{$user->full_name}}</h4>
                        </div>
                        <div class="mt-3">
                            <label style="font-size: 24px;color: rgb(247,89,89);">Birthday:</label>
                        </div>
                        <div class="mt-1">
                            <h4>{{$user->birthday}}</h4>
                        </div>
                        <div class="mt-3">
                            <label style="font-size: 24px;color: rgb(247,89,89);">Email:</label>
                        </div>
                        <div class="mt-1">
                            <h4>{{$user->email}}</h4>
                        </div>
                        <div class="mt-3">
                            <label style="font-size: 24px;color: rgb(247,89,89);">Profile created date:</label>
                        </div>
                        <div class="mt-1">
                            <h4>{{$user->created_at}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
