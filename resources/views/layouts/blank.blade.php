<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="天梯子">
    <meta name="author" content="天梯子">
    <meta name="keyword" content="天梯子">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <title>天梯子-@yield('title')</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Premium Icons -->
    <link href="{{ asset('css/glyphicons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glyphicons-filetypes.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/glyphicons-social.css') }}" rel="stylesheet">--}}

<!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>


<body class="app header-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
{{--TODO--}}
        {{--<li class="nav-item px-1">--}}
            {{--<a class="nav-link" href="#">佣金排行榜</a>--}}
        {{--</li>--}}
    </ul>
    <ul class="nav navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                @if(Auth::check())
                    <span class="hidden-md-down">{{ Auth::user()->name }}</span>
                @else
                    {{ url('/login') }}
                @endif


            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header text-center">
                    <strong>账号</strong>
                </div>

                <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i>个人信息</a>

                <div class="dropdown-header text-center">
                    <strong>设置</strong>
                </div>
                <a id="logout" name="logout" class="dropdown-item" href="{{ route('logout') }}"><i
                            class="icon-logout"></i> 退出</a>
            </div>
        </li>

    </ul>
</header>

<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}"><i class="icon-speedometer"></i> 用户中心</a>
                </li>

                <li class="divider"></li>
                <li class="nav-title nav-item">
                    <i class="icon-settings">&nbsp; 操作</i>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/node')  }}"><i class="icon-paper-plane"></i>节点列表</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/buy')  }}"><i class="icon-basket"></i>购买服务</a>
                </li>
{{--TODO--}}
                {{--<li class="nav-item nav-dropdown">--}}
                    {{--<a class="nav-link" href="#"><i class="icon-energy"></i> 流量记录</a>--}}

                {{--</li>--}}

                {{--<li class="nav-item ">--}}
                    {{--<a class="nav-link" href="#"><i class="icon-speech"></i>提交工单</a>--}}
                {{--</li>--}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/user/gift')  }}"><i class="icon-handbag"></i>礼品兑换</a>
                </li>

                <li class="divider"></li>
                <li class="nav-title">
                    <i class="icon-target"></i>&nbsp; 其它
                </li>
                {{--TODO--}}
                {{--<li class="nav-item nav-dropdown">--}}
                    {{--<a class="nav-link" href="{{ url('/user/spread')  }}"><i class="icon-wallet"></i>赚取佣金</a>--}}

                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-diamond"></i>定制中心</a>
                </li>

                <li class="divider"></li>
                {{--TODO--}}
                {{--<li class="nav-title">--}}
                    {{--服务器运营状况--}}
                {{--</li>--}}
                {{--<li class="nav-item px-1 hidden-cn">--}}
                    {{--<div class="text-uppercase mb-q">--}}
                        {{--<i class="icon-people"></i>--}}
                        {{--<small><b>在线人数比例</b>--}}
                        {{--</small>--}}
                    {{--</div>--}}
                    {{--<div class="progress progress-xs">--}}
                        {{--<div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"--}}
                             {{--aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--</div>--}}
                    {{--<small class="text-muted"> 348 在线 总人数4/1</small>--}}
                {{--</li>--}}
                {{--<li class="nav-item px-1 hidden-cn">--}}
                    {{--<div class="text-uppercase mb-q">--}}
                        {{--<i class="icon-shuffle"></i>--}}
                        {{--<small><b>今日产生总流量</b>--}}
                        {{--</small>--}}
                    {{--</div>--}}
                    {{--<div class="progress progress-xs">--}}
                        {{--<div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70"--}}
                             {{--aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--</div>--}}
                    {{--<small class="text-muted">11444GB</small>--}}
                {{--</li>--}}
                {{--<li class="nav-item px-1 hidden-cn">--}}
                    {{--<div class="text-uppercase mb-q">--}}
                        {{--<i class="icon-shield"></i>--}}
                        {{--<small><b>服务器在线比列</b>--}}
                        {{--</small>--}}
                    {{--</div>--}}
                    {{--<div class="progress progress-xs">--}}
                        {{--<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="95"--}}
                             {{--aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--</div>--}}
                    {{--<small class="text-muted">10/10</small>--}}
                {{--</li>--}}

            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <main class="main">

        <div class="container-fluid">

            <div class="animated fadeIn">
                @yield('main')
            </div>

        </div>
        <!-- /.conainer-fluid -->
    </main>


</div>

<footer class="app-footer">
    <a href="https://genesisui.com">天梯子</a> © 2017
    <span class="float-right">
            Powered by <a href="https://genesisui.com">天行网络服务</a>
        </span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('js/libs/jquery.min.js') }}"></script>
<script src="{{ asset('js/libs/tether.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/libs/pace.min.js') }}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{ asset('js/libs/Chart.min.js') }}"></script>

<!-- GenesisUI main scripts -->

<script src="{{ asset('js/app.js') }}"></script>
@yield('script')
</body>

</html>