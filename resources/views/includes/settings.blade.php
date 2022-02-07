@extends('layouts.main')

@section('title','Settings')

@section('content')
    <div class="container" style="font-family: Montserrat;">
        <div class="col">
            <div class="row mt-4">
                <div class="col-sm-3">
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
                <div class="col-sm-4 ">
                        <form action="{{route('updateprofile', auth()->user()->full_name)}}" method="post">
                            @csrf
                            <h3>Edit Profile</h3>
                            <div class="form-group mt-2">
                                <label>Full Name:</label>
                                <input type="text" name="full_name" value="{{$user->full_name}}" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-3">
                                <label>Email:</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-3">
                                <label>Birthday</label>
                                <input type="date" name="birthday" value="{{$user->birthday}}" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModel" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%);" >Update Profile</button>
                            </div>
                        </form>
                        <form action="{{route('uploadimage', auth()->user()->full_name)}}" method="post" enctype="multipart/form-data" class="mt-4">
                            @csrf
                            <h3>Edit Picture</h3>
                            <div class="form-group mt-2">
                                <label>Picture:</label>
                                <input type="file" name="avatar" class="form-control mt-2">
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModel" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%);" >Update Picture</button>
                            </div>
                        </form>
                </div>
                <div class="col-sm-4 offset-1">
                    <form action="{{route('updatepassword', auth()->user()->full_name)}}" method="post">
                        @csrf
                        <h3>Edit Password</h3>
                        <div class="form-group mt-2">
                            <label>Old Password:</label>
                            <input type="password" name="current_password" class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label>New Password:</label>
                            <input type="password" name="new_password" class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <label>Confirm Password:</label>
                            <input type="password" name="confirm_password" class="form-control mt-2">
                        </div>
                        <div class="form-group mt-3">
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteItemModel" style="background: linear-gradient(135deg, #f75959 0%, #f35587 100%);" >Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
