@extends('layouts.app1')

@section('title','注册页面')

@section('contain')

    <div class="col-md-6">
        <div class="card mx-2">
            <div class="card-block p-2">
                <h1>注册</h1>
                <p class="text-muted">注册账号</p>
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
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

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
                    <div class="col-6">
                        <button class="btn btn-block btn-facebook" type="button">
                            <span>facebook</span>
                        </button>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-block btn-twitter" type="button">
                            <span>twitter</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection