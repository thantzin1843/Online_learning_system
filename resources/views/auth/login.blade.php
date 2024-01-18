<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose Online Learning System</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
    rel="stylesheet"
    />
    <!-- Custom css -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>


    <div class="container">
        <div class="row">
            <div class="logo col-4 offset-4 mt-3 mb-3">
                <img src="{{asset('img/rose-high-resolution-logo-white-on-transparent-background.png')}}" class="logoImg"/>
                <span class="font">Rose Online Learning System</span>
            </div>
            <div class="col-6 offset-3 loginCard p-4">
                <div class="loginCard p-4 text-center">
                    <div class="loginCard p-5 text-center">
                        <form action="{{route('login')}}" method='post'>
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name='email' class="form-control bg-purple" id="floatingInput" placeholder="name@example.com" onfocus="noChange()">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                              <span class='text-danger'>{{$message}}</span>
                              @enderror
                              </div>

                              <div class="form-floating">
                                <input type="password" name='password' class="form-control bg-purple" id="floatingPassword" placeholder="Password" onfocus="noChange()">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                              <span class='text-danger'>{{$message}}</span>
                              @enderror
                              </div>
                              <button type='submit' class="btn login">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
<script src="{{asset('js/login.js')}}"></script>
</body>
</html>
