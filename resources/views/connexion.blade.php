<?php
/**
 * Created by PhpStorm.
 * User: ghdj9
 * Date: 08/06/2017
 * Time: 04:27
 */
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <style>
        * {
            -webkit-tap-highlight-color: transparent;
            -moz-tap-highlight-color: transparent;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px white inset;
        }

        body {
            margin: 0;
            padding: 0;
            overflow-y: hidden;
            background: #242A37;
            font-family: 'Open Sans', sans-serif;
        }

        #container {
            width: 100%;
            height: 70px;
            max-width: 400px;
            margin: auto;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            -webkit-perspective: 800;
            -webkit-perspective-origin: 50% 70px;
            -moz-perspective: 800;
            -moz-perspective-origin: 50% 70px;
            animation-name: slidein;
            animation-duration: 0.7s;
        }

        .inputbox {
            margin: auto;
            width: 100%;
            height: 70px;
            max-width: 400px;
            -webkit-transition: -webkit-transform .5s linear;
            -webkit-transform-style: preserve-3d;
            -moz-transition: -moz-transform .5s linear;
            -moz-transform-style: preserve-3d;
            transition: -webkit-transform 0.4s;
        }
        .inputbox .face {
            position: absolute;
            width: 100%;
            height: 70px;
            max-width: 400px;
            padding: 0px;
            font-size: 27px;
            line-height: 1em;
            color: #fff;
        }
        .inputbox .front {
            -webkit-transform: translateZ(35px);
            -moz-transform: translateZ(35px);
            background-color: #fff;
        }
        .inputbox .front .user:before {
            float: left;
            font-family: 'FontAwesome';
            content: '\f003';
            line-height: 70px;
            font-size: 24px;
            color: #242A37;
            padding: 0 20px;
        }
        .inputbox .top {
            -webkit-transform: rotateX(90deg) translateZ(35px);
            -moz-transform: rotateX(90deg) translateZ(35px);
            background-color: #fff;
        }
        .inputbox .top .email:before {
            float: left;
            font-family: 'FontAwesome';
            content: '\f003';
            line-height: 70px;
            font-size: 24px;
            color: #242A37;
            padding: 0 20px;
        }
        .inputbox .back {
            -webkit-transform: rotateX(180deg) translateZ(35px);
            -moz-transform: rotateX(180deg) translateZ(35px);
            background-color: #fff;
        }
        .inputbox .back .lock:before {
            float: left;
            font-family: 'FontAwesome';
            content: '\f023';
            line-height: 70px;
            font-size: 24px;
            color: #242A37;
            padding: 0 20px;
        }
        .inputbox .bottom {
            -webkit-transform: rotateX(-90deg) translateZ(35px);
            -moz-transform: rotateX(-90deg) translateZ(35px);
            background-color: #fff;
        }
        .inputbox .bottom .heart:before {
            float: left;
            font-family: 'FontAwesome';
            content: '\f08a';
            line-height: 70px;
            font-size: 24px;
            color: #242A37;
            padding: 0 20px;
        }
        .inputbox .bottom .heart2:before {
            float: right;
            font-family: 'FontAwesome';
            content: '\f08a';
            line-height: 70px;
            font-size: 24px;
            color: #242A37;
            padding: 0 20px;
        }
        .inputbox .bottom .text {
            float: left;
            color: #242A37;
            background: #fff;
            font-size: 15px;
            line-height: 68px;
            text-align: center;
            letter-spacing: 4.2px;
            text-transform: uppercase;
        }
        .inputbox .bottom .text span {
            position: absolute;
            left: 50%;
            width: 100%;
            transform: translateX(-50%);
        }
        .inputbox .submit:before {
            float: right;
            font-family: 'FontAwesome';
            content: '\f063';
            line-height: 70px;
            font-size: 24px;
            color: #dcdee0;
            padding: 0 20px;
            overflow: hidden;
        }
        .inputbox .submit:hover:before {
            color: #242A37;
            cursor: pointer;
        }
        .inputbox input {
            float: left;
            border: 0;
            outline: 0;
            width: 60%;
            color: #242A37;
            background: #fff;
            height: 68px;
            font-size: 15px;
            letter-spacing: 4.2px;
            text-transform: uppercase;
        }
        .inputbox input::-webkit-input-placeholder {
            color: #dcdee0;
        }
        .inputbox input:-moz-placeholder {
            color: #dcdee0;
        }
        .inputbox input::-moz-placeholder {
            color: #dcdee0;
        }
        .inputbox input:-ms-input-placeholder {
            color: #dcdee0;
        }

        @keyframes slidein {
            0% {
                top: 100%;
            }
            50% {
                top: -25px;
            }
            100% {
                top: 0px;
            }
        }
        @keyframes slideout {
            0% {
                bottom: 0;
            }
            50% {
                bottom: -35px;
            }
            100% {
                bottom: 110%;
            }
        }
        @keyframes wiggle1 {
            0% {
                -webkit-transform: rotateX(-90deg);
            }
            50% {
                -webkit-transform: rotateX(-100deg);
            }
            0% {
                -webkit-transform: rotateX(-90deg);
            }
        }
        @keyframes wiggle2 {
            0% {
                -webkit-transform: rotateX(-180deg);
            }
            50% {
                -webkit-transform: rotateX(-190deg);
            }
            0% {
                -webkit-transform: rotateX(-180deg);
            }
        }
        @keyframes wiggle3 {
            0% {
                -webkit-transform: rotateX(-270deg);
            }
            50% {
                -webkit-transform: rotateX(-280deg);
            }
            0% {
                -webkit-transform: rotateX(-270deg);
            }
        }

    </style>
</head>
<body>
<div id="container">
    <form id="form-login" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
    <div class="inputbox">
        <div class="face front">
            <div class="user"></div>
            <input type="text" name="email" placeholder="e-mail" autocorrect="off"/>
            <div class="submit"></div>
        </div>
        <div class="face top">
            <div class="email"></div>
            <input type="text" name="email" placeholder="e-mail" autocorrect="off"/>
            <div class="submit"></div>
        </div>
        <div class="face back">
            <div class="lock"></div>
            <input type="password" name="password" placeholder="Mot de passe" autocorrect="off"/>
            <div class="submit"></div>
        </div>
        <div class="face bottom">
            <div class="heart"></div>
            <div class="text"><span>Bienveue </span></div>
            <div class="heart2"></div>
        </div>
    </div>
        </form>
</div>
<script>
    function changeBottom() {
        $("#container").css( "bottom", "150%" )
    }
    $(document).on("click", ".front .submit", function() {
        $(".inputbox").css( "-webkit-transform", "rotateX(-180deg)" );
        $(".inputbox").css( "animation-name", "wiggle2" );
        $(".inputbox").css( "animation-duration", "1s" );
        $(".inputbox").css( "animation-delay", ".22s" );
    });
    $(document).on("click", ".top .submit", function() {
        $(".inputbox").css( "-webkit-transform", "rotateX(-180deg)" );
        $(".inputbox").css( "animation-name", "wiggle2" );
        $(".inputbox").css( "animation-duration", "1s" );
        $(".inputbox").css( "animation-delay", ".22s" );
    });
    $(document).on("click", ".back .submit", function() {
        $(".inputbox").css( "-webkit-transform", "rotateX(-270deg)" );
        $(".inputbox").css( "animation-name", "wiggle3" );
        $(".inputbox").css( "animation-duration", "1s" );
        $(".inputbox").css( "animation-delay", ".22s" );
        $("#container").css( "animation-name", "slideout" );
        $("#container").css( "animation-speed", "0.7s" );
        $("#container").css( "animation-delay", "1.5s" );
        setTimeout(changeBottom, 2000);
        $('#form-login').submit();
    });
</script>
</body>
</html>

