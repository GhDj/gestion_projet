<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Se connecter</title>
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

</head>
<body id="login-body">
    <div class="logo responsive-img">
        <img class="img-logo" src="{{ asset('images/logo.png') }}">
    </div>

   <div class="container">


       <div class="inputbox">
        <div class="face front">
            <div class="user"></div>
            <input type="text" name="username" placeholder="username" autocorrect="off"/>
            <div class="submit"></div>
        </div>
        <div class="face top">
            <div class="email"></div>
            <input type="text" name="emaill" placeholder="e-mail"/>
            <div class="submit"></div>
        </div>
        <div class="face back">
            <div class="lock"></div>
            <input type="password" name="password" placeholder="password" autocorrect="off"/>
            <div class="submit"></div>
        </div>
        <div class="face bottom">
            <div class="heart"></div>
            <div class="text"><span>you are welcome</span></div>
            <div class="heart2"></div>
        </div>
    </div>

    </div>
    <form class="form-login" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="face front">

            <div class="form-login">
                <h1 class="titre-login"> Se connecter</h1>


                <div class="input-field col s6">
                    <input  id="first_name" type="text" class="validate" name="email">
                    <label for="first_name">Email</label>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4 right-align ">
                        <a href="#part2" class="btn btn-primary btn-suivant">
                            Suivant
                        </a>


                    </div>
                </div>
            </div>
        </div>
        <div class="form-login" id="part2">
            <h1 class="titre-login"> Se connecter</h1>


            <div class="input-field col s6">
                <input  id="first_name" type="text" class="validate" name="password">
                <label for="first_name">Password</label>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4 right-align ">
                    <button type="submit" class="btn btn-primary btn-suivant">
                        Se connecter
                    </button>


                </div>
            </div>
        </div>


        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>


    </form>
<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>


</body>
</html>





