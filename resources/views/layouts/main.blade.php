<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, rgb(247,89,89) 0%, #f35587 100%); font-family: Montserrat;">
        <div class="container d-flex">
                <a class="navbar-brand" href="{{route('user.home')}}">
                    <img src="/images/tick-mark.png" alt="" width="30" height="30" class="d-inline-block align-text-top ml-5">
                    <strong>ToDo</strong>
                </a>
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('user.home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('taskData')}}">All Tasks</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" role="button" aria-current="page" href="{{route('profile',auth()->user()->full_name,auth()->id())}}">
{{--                                <img src="/images/{{\Illuminate\Support\Facades\Auth::user()->avatar}}" class="card-img-top" alt="..." style="display: block; width:32px; height:32px; position: absolute; top: 10px; left: 10px; border-radius:50%">--}}
                                {{auth()->user()->full_name}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.logout')}}">Logout</a>
                        </li>
                    </ul>
                </div>
{{--                <div id="navbarSupportedContent">--}}
{{--                    <ul class="navbar-nav nav me-auto mb-2 mb-lg-0">--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                {{auth()->user()->full_name}}--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                <li>--}}
{{--                                    <a class="dropdown-item" href="#">--}}
{{--                                        My Profile--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a class="dropdown-item" href="{{route('user.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                       Logout--}}
{{--                                    </a>--}}
{{--                                    <form id="logout-form" action="{{route('user.logout')}}" method="post" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                        <li class="nav-item">--}}
{{--                            <span class="nav-link active">{{auth()->user()->full_name}}</span>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}
{{--                <div>--}}
{{--                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" aria-current="page" href="{{route('user.logout')}}">Logout</a>--}}
{{--                            </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
        </div>
    </nav>
    @include('includes.messages')
    @yield('content')
</body>

<script src="/js/app.js"></script>
</html>
