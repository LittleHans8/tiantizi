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
                    <div class="text-center" style="margin-top: 24px">
                        <a class="btn btn-outline-primary" href="{{ url('/try') }}" target="_blank">一键体验</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="intro__title animate-scroll" data-animate-scroll=""></div>
            <div class="text-md-center">
                <small class="text-muted">免费体验</small>
                <br>
                <small class="text-muted ">阿里云专属线路</small>
                <br>
                <small class="text-muted ">超高性价比</small>
                <br>
                <small class="text-muted ">秒开4Kyoutube</small>
                <br>
                <br>
            </div>
        </div>

        <div class="text-center" style="margin-top: 24px">
            @if (Route::has('login'))
                @if (Auth::check())
                    <a class="btn btn-outline-primary" href="{{ url('/home') }}" target="_blank">用户中心</a>
                @else
                    <a href="/login" target="_blank" class="btn btn-outline-primary">
                        登录
                    </a>

                    <a href="/register" target="_blank" class="btn btn-outline-primary">
                        注册
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

<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?7220a80ac32597f70f6a5c2693216c7e";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</body>
<div></div>
</html>