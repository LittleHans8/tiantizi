<!DOCTYPE html>
<html lang="en" class="wf-brandongrotesque-n9-active wf-active">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>天梯子</title>
    <meta name="description"
          content="免费ss服务|科学上网">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

<main class="site-container" id="site-container" role="main">

    <div class="intro" style="height: 582px;">
        <div class="intro__content">
            <div class="intro__logo animate-scroll" data-animate-scroll="">
                <!--logo-->
                <div>
                    <img src="{{ asset('img/favicon.png') }}">
                    <h1>天梯子</h1>
                    <h3>提供SS网络加速服务</h3>
                </div>
            </div>
            <br>
            <div class="intro__title animate-scroll" data-animate-scroll=""></div>
            <div class="text-md-center">
                <small class="text-muted">你说你喜欢雨,但是你下雨的时候却打伞</small>
                <br>
                <small class="text-muted ">你说你喜欢太阳,但是你却在阳光明媚的时候躲在阴凉的地方</small>
                <br>
                <small class="text-muted ">你说你喜欢风,但是在刮风的时候你却关上窗户</small>
                <br>
                <small class="text-muted ">这就是为什么我会害怕你说想要自由</small>
                <br>
                <small class="text-muted">却不科学上网</small>
                <br>
            </div>
        </div>

        <div class="text-center" style="margin-top: 24px">
            @if (Route::has('login'))
                @if (Auth::check())
                    <a class="btn btn-outline-primary" href="{{ url('/home') }}" target="_blank">用户中心</a>
                @else
                    <a href="/login" target="_blank" class="btn btn-outline-primary">
                        发现自由
                    </a>

                    <a href="/register" target="_blank" class="btn btn-outline-primary">
                        新的世界
                    </a>
                @endif
            @endif
        </div>
        <canvas id="draw-me-a-sheep" class="intro__canvas" width="1349" height="582"></canvas>
        <canvas id="particles" class="intro__canvas" width="1349" height="582"></canvas>
    </div>
    <div id="action" class="hiding-canvas" data-midnight="black"></div>
</main>

<script src="{{ asset('js/libs/main.js') }}"></script>
</body>
<div></div>
</html>