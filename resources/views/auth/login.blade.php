@extends('layouts.app')

@section('title','登陆页面')

@section('contain')
    <div class="col-md-8">
        <div class="card-group mb-0">
            <div class="card p-2">
                <div class="card-block">
                    <h1>登陆</h1>
                    <p class="text-muted">它墙任它墙，登陆账号，发现自由</p>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="input-group mb-1 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                            <input type="email" name="email" class="form-control" placeholder="邮箱"
                                   value="{{ old('email') }}" required autofocus>
                        </div>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                        <div class="input-group mb-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                            <input type="password" name="password" class="form-control" placeholder="密码" required>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif

                        <div class="input-group mb-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住我
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-2">登陆</button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-link px-0">忘记密码?</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                <div class="card-block text-center">
                    <div>
                        <h2>注册</h2>
                        <p>我们的身边充满精彩事物，但大多数人从未留意</p>
                        <p>世界那么大，你不出去看看么?</p>
                        <p>注册一个账号，发现新的世界</p>
                        <button type="button" class="btn btn-primary active mt-1"
                                onclick="window.location.href='{{ url('/register') }}'">马上注册!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection