@extends('layouts.app')

@section('title','注册页面')

@section('contain')

    <div class="col-md-6">
        <div class="card mx-2">
            <div class="card-block p-2">
                <h1>注册</h1>
                <p class="text-muted">注册一个账号，发现新的世界</p>
                <form role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="input-group mb-1  {{  $errors->has('name') ? ' badge-danger' : '' }}">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                        <input id="name" name="name" type="text" class="form-control" value="{{ old('name') }}"
                               placeholder="用户名" required autofocus>
                    </div>

                    @if($errors->has('name'))
                        <div class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif

                    <div class="input-group mb-1 {{ $errors->has('email') ? ' badge-danger' : '' }}">
                        <span class="input-group-addon">@</span>
                        <input id="email" name="email" type="text" class="form-control" placeholder="邮箱"
                               value="{{ old('email') }}" required>
                        {{--<span id="span_send_code" class="input-group-addon">--}}
                        {{--<a id="send_code" href="#">发送验证码</a></span>--}}
                    </div>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    {{--<div class="input-group mb-1 {{ $errors->has('code') ? ' badge-danger' : '' }}">--}}
                    {{--<span class="input-group-addon"><i class="icon-note"></i></span>--}}
                    {{--<input id="text" name="code" type="text" class="form-control" placeholder="验证码"--}}
                    {{--value="{{ old('code') }}" required>--}}
                    {{--</div>--}}

                    {{--@if ($errors->has('code'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('code') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}

                    <div class="input-group mb-1 {{ $errors->has('password') ? ' badge-danger' : '' }}">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                        <input id="password" name="password" type="password" class="form-control" placeholder="密码"
                               required>
                    </div>
                    @if ($errors->has('password'))
                        <div class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif

                    <div class="input-group mb-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                               placeholder="重复密码" required>
                    </div>

                    <button type="submit" class="btn btn-block btn-success">注册</button>
                </form>
            </div>

            <div class="card-footer p-2">
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-block btn-primary" type="button" onclick="window.location='{{ url('/login') }}'">
                            <span>登陆</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$("#send_code").click(function () {--}}
    {{--var counter = 5;--}}
    {{--$("#span_send_code").css("pointer-events", "none");--}}
    {{--var interval = setInterval(function () {--}}
    {{--counter--;--}}
    {{--$("#send_code").text(counter + "s");--}}

    {{--if (counter == 0) {--}}
    {{--$("#span_send_code").css("pointer-events", "auto");--}}
    {{--$("#send_code").text("重新发送");--}}
    {{--clearInterval(interval);--}}
    {{--}--}}
    {{--}, 1000);--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection

