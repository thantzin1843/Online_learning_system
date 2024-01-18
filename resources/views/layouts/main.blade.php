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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <link href="{{asset('css/home.css')}}" rel="stylesheet"/>
</head>
<body>

    <div class="col-12">
        <div class="second">
            <div class="left col-3">
                <div class="col-12 logo">
                    <img src="{{asset('img/rose-high-resolution-logo-white-on-transparent-background.png')}}" class="logoImg">
                    <span style="font-weight:bold">Rose Online Learning System</span>
                </div>
                <div class=" mx-5  text-left sticky " style="">

                          @yield('link')
                </div>
            </div>
            <div class="right col-9 p-3">
                <div class="shortMenu col-8 offset-2">
                   @if(Auth::user()->role == 'admin')
                   <a href="{{route('admin#home')}}" class="menu"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a>
                   <a href="{{route('profile')}}" class="menu"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Account</a>

                   <a href="{{route('change#password#admin')}}" class="menu"><i class="fa-solid fa-key"></i>&nbsp;&nbsp;Change Password</a>

                   @elseif(Auth::user()->role == 'student')
                   <a href="{{route('student#home')}}" class="menu"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a>
                   <a href="{{route('student#profile')}}" class="menu"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Account</a>
                   <a href="{{route('change#password')}}" class="menu"><i class="fa-solid fa-key"></i>&nbsp;&nbsp;Change Password</a>
                    @elseif(Auth::user()->role == 'teacher')
                    <a href="{{route('teacher#home')}}" class="menu"><i class="fa-solid fa-house"></i>&nbsp;&nbsp;Home</a>
                   <a href="{{route('teacher#profile')}}" class="menu"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Account</a>
                   <a href="{{route('change#passwordPage')}}" class="menu"><i class="fa-solid fa-key"></i>&nbsp;&nbsp;Change Password</a>
                   @endif
                    <form action="{{route('logout')}}" method='post'>
                    @csrf
                    <button  class="menu btn btn-black" type='submit'><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;Log Out</button>
                    </form>
                </div>
            <div class='col-12 mt-4 '>
                @yield('content')
            </div>
            </div>
        </div>
    </div>

    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src='{{asset('js/addTeacher.js')}}'></script>
    <script src='{{asset('js/lecture.js')}}'></script>
    @yield('js')
</body>
</html>
