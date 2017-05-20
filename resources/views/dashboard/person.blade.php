@extends('layouts.blank')

@section('title','用户中心')

@section('main')

    <div class="row" style="margin-top: 40px">

        <div class="col-md-4 ui-sortable">
            <div class="row dragdrop">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-user"></i>用户信息
                        </div>
                        <div class="card-block">

                            <p>用户类型：{{ $data['display_name'] }}</p>
                            <p>月流量：{{ $data['transfer_enable'] }}G</p>
                            <p>端口：{{ $user->port }}</p>
                            <p>密码：{{ $user->passwd }}</p>
                            <p>默认加密方式：{{ $user->method }}</p>
                            <p>服务到期时间：{{ $data['expired_at']  }}</p>

                            @role('free')
                            <p>备注：希望免费的服务能为您提供一些帮助:-)</p>
                            @endrole

                            <button type="button" class="btn btn-outline-primary">升级套餐</button>

                            @role('free')
                            <button type="button" class="btn btn-outline-primary">支持我们</button>
                            @endrole()

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 ui-sortable">
            <div class="row dragdrop">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-shuffle"></i>流量情况
                        </div>

                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 m-0">共{{ $data['transfer_enable'] }} GB</div>
                                <div>已使用 {{ $data['total_used'] }} GB...</div>
                                <div class="progress progress-white progress-xs my-1">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: {{ $data['progress_value'] }}%"
                                         aria-valuenow="{{ $data['progress_value'] }}"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">注意：流量会延迟一段时间后记录...</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 ui-sortable">
            <div class="row">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-bulb"></i>公告
                        </div>
                        <div class="card-block">
                            内测期间所有套餐享8折优惠:-)
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection