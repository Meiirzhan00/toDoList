<!doctype html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style2.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                @if(session()->has('email'))
                    <div class="alert alert-danger">
                        <p>{{session('email')}}</p>
                    </div>
                @endif
                <div class="wrap d-flex">
                    <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                        <div class="text w-100">
                            <h2>Welcome to ToDo <img src="images/tick-mark.png" alt="" width="30" height="30" class="d-inline-block align-text-top ml-1"></h2>
                            <p>Already a member?</p>
                            <a href="{{route('user.login')}}" class="btn btn-white btn-outline-white">Sign In</a>
                        </div>
                    </div>
                    <div class="login-wrap p-4 p-lg-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4 d-flex justify-content-center">Sign Up</h3>
                            </div>
                        </div>
                        <form action="{{route('user.register')}}" method="post" class="signin-form">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="label" for="name">Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="birthday">Birthday</label>
                                <input type="date" name="birthday" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Addres" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

