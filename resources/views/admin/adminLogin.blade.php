<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        @if(session()->has('message'))
        <p class="alert alert-danger">{{session()->get('message')}}</p>
        @endif

        @if($errors->any())
        @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
        @endforeach
        @endif
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Login Form </h3>
                <form action="{{route('login.admin')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email *" name="email" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" name="password" />
                    </div>
                    <!-- <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <a href="{{route('login.google')}}" class="btn btn-danger btn-block">Login with Google</a>
                            <a href="{{route('login.facebook')}}" class="btn btn-primary btn-block">Login with Facebook</a>
                            <a href="{{route('login.github')}}" class="btn btn-dark btn-block">Login with Github</a>
                        </div>


                    </div> -->
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                </form>
            </div>

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>