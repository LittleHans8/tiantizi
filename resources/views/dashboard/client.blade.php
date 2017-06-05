@extends('layouts.blank')

@section('title','客户端下载')

@section('main')

    <div class="col-sm-10 col-md-10" style="margin-top: 48px;">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="icon-screen-desktop"></i>客户端下载
            </div>
            <div class="card-block">
                <div class="text-md-center">
                    <a href="http://tiantizi.oss-cn-shenzhen.aliyuncs.com/client/Shadowsocks-4.0.4.zip" class="btn btn-outline-primary"><span class="fa fa-windows"></span> Window 客户端</a>
                    <a href="http://tiantizi.oss-cn-shenzhen.aliyuncs.com/client/shadowsocks-nightly-4.1.7.apk" class="btn btn-outline-primary"><span class="fa fa-android"></span> Android 客户端</a>
                    <a href="http://appsto.re/cn/pD8pgb.i" class="btn btn-outline-primary" target="_blank"><span class="fa fa-apple"></span> IOS 客户端</a>
                    <a href="http://tiantizi.oss-cn-shenzhen.aliyuncs.com/client/ShadowsocksX-NG.1.5.1.zip" class="btn btn-outline-primary"><span class="fa fa-desktop"></span> MAC 客户端</a>
                </div>

            </div>
        </div>
    </div>

@endsection