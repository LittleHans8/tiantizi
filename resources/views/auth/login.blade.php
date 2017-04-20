@extends('layouts.app')

@section('title','登陆页面')

@section('contain')
    <div class="col-md-8">
        <div class="card-group mb-0">
            <div class="card p-2">
                <div class="card-block">
                    <h1>登陆</h1>
                    <p class="text-muted">它墙任它墙，登陆账号，发现自由</p>
                    <div class="input-group mb-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                        <input type="text" class="form-control" placeholder="用户名">
                    </div>
                    <div class="input-group mb-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                        <input type="password" class="form-control" placeholder="密码">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary px-2">登陆</button>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-link px-0">忘记密码?</button>
                        </div>
                    </div>
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
                                onclick="window.location.href='/register'">马上注册!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection