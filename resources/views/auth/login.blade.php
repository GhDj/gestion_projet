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
    <title>Connect Project - Connexion</title>
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

        body::before {
            content:"";
            display: block;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, .7);
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Open Sans', sans-serif;
            background-color: rgba(0,0,0,0.5);
            background-image: url({{ asset('img/login-bg.jpg') }});
            background-size: cover;
        }


        @-moz-keyframes animate {
            from {background-position:0 0;}
            to {background-position: 500px 0;}
        }

        @-ms-keyframes animate {
        from {background-position:0 0;}
        to {background-position: 500px 0;}
        }

        @-o-keyframes animate {
            from {background-position:0 0;}
            to {background-position: 500px 0;}
        }

        @keyframes animate {
            from {background-position:0 0;}
            to {background-position: 500px 0;}
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

        canvas {
            position: absolute;
        }

        #logo {
            position: relative;
            text-align: center;
            width: 35%;
            margin: auto;
            padding-top: 5%;
        }

        #logo img {
            width: 100%;
        }

    </style>
</head>
<body>
<canvas></canvas>
<div id="logo">
    <img src="{{ asset('img/logo.png') }}" alt="">
</div>
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
                <!--<input type="text" name="email" placeholder="e-mail" autocorrect="off"/>-->
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


    //CANVAS
    $(function(){
        var canvas = document.querySelector('canvas'),
                ctx = canvas.getContext('2d')
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        ctx.lineWidth = .3;
        ctx.strokeStyle = (new Color(150)).style;

        var mousePosition = {
            x: 30 * canvas.width / 100,
            y: 30 * canvas.height / 100
        };

        var dots = {
            nb: 250,
            distance: 100,
            d_radius: 150,
            array: []
        };

        function colorValue(min) {
            return Math.floor(Math.random() * 255 + min);
        }

        function createColorStyle(r,g,b) {
            return 'rgba(' + r + ',' + g + ',' + b + ', 0.8)';
        }

        function mixComponents(comp1, weight1, comp2, weight2) {
            return (comp1 * weight1 + comp2 * weight2) / (weight1 + weight2);
        }

        function averageColorStyles(dot1, dot2) {
            var color1 = dot1.color,
                    color2 = dot2.color;

            var r = mixComponents(color1.r, dot1.radius, color2.r, dot2.radius),
                    g = mixComponents(color1.g, dot1.radius, color2.g, dot2.radius),
                    b = mixComponents(color1.b, dot1.radius, color2.b, dot2.radius);
            return createColorStyle(Math.floor(r), Math.floor(g), Math.floor(b));
        }

        function Color(min) {
            min = min || 0;
            this.r = colorValue(min);
            this.g = colorValue(min);
            this.b = colorValue(min);
            this.style = createColorStyle(this.r, this.g, this.b);
        }

        function Dot(){
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;

            this.vx = -.5 + Math.random();
            this.vy = -.5 + Math.random();

            this.radius = Math.random() * 2;

            this.color = new Color();
            console.log(this);
        }

        Dot.prototype = {
            draw: function(){
                ctx.beginPath();
                ctx.fillStyle = this.color.style;
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                ctx.fill();
            }
        };

        function createDots(){
            for(i = 0; i < dots.nb; i++){
                dots.array.push(new Dot());
            }
        }

        function moveDots() {
            for(i = 0; i < dots.nb; i++){

                var dot = dots.array[i];

                if(dot.y < 0 || dot.y > canvas.height){
                    dot.vx = dot.vx;
                    dot.vy = - dot.vy;
                }
                else if(dot.x < 0 || dot.x > canvas.width){
                    dot.vx = - dot.vx;
                    dot.vy = dot.vy;
                }
                dot.x += dot.vx;
                dot.y += dot.vy;
            }
        }

        function connectDots() {
            for(i = 0; i < dots.nb; i++){
                for(j = 0; j < dots.nb; j++){
                    i_dot = dots.array[i];
                    j_dot = dots.array[j];

                    if((i_dot.x - j_dot.x) < dots.distance && (i_dot.y - j_dot.y) < dots.distance && (i_dot.x - j_dot.x) > - dots.distance && (i_dot.y - j_dot.y) > - dots.distance){
                        if((i_dot.x - mousePosition.x) < dots.d_radius && (i_dot.y - mousePosition.y) < dots.d_radius && (i_dot.x - mousePosition.x) > - dots.d_radius && (i_dot.y - mousePosition.y) > - dots.d_radius){
                            ctx.beginPath();
                            ctx.strokeStyle = averageColorStyles(i_dot, j_dot);
                            ctx.moveTo(i_dot.x, i_dot.y);
                            ctx.lineTo(j_dot.x, j_dot.y);
                            ctx.stroke();
                            ctx.closePath();
                        }
                    }
                }
            }
        }

        function drawDots() {
            for(i = 0; i < dots.nb; i++){
                var dot = dots.array[i];
                dot.draw();
            }
        }

        function animateDots() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            moveDots();
            connectDots();
            drawDots();

            requestAnimationFrame(animateDots);
        }

        $('canvas').on('mousemove', function(e){
            mousePosition.x = e.pageX;
            mousePosition.y = e.pageY;
        });

        $('canvas').on('mouseleave', function(e){
            mousePosition.x = canvas.width / 2;
            mousePosition.y = canvas.height / 2;
        });

        createDots();
        requestAnimationFrame(animateDots);
    });
</script>
</body>
</html>

