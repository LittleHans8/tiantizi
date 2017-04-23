@extends('layouts.blank')


@section('title','购买服务')

@section('main')

    <div class="row" style="margin-top: 40px">

        <div class="col-md-4 ui-sortable">
            <div class="row dragdrop">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-paper-plane"></i>小流量版
                        </div>

                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 text-md-center">小流量套餐</div>
                                <div class="h3 text-md-center">￥9.9
                                <span>/月</span>
                                </div>
                                <div class="text-md-center">
                                    <small class="text-muted ">备注：此套餐学生享用9.5 折优惠...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：20G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>香港，日本，美国，台湾，新加坡，韩国</p>
                            <button type="button" class="btn btn-outline-primary btn-block">升级套餐</button>
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
                            <i class="icon-paper-plane"></i>中流量套餐
                        </div>

                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 text-md-center">中流量版</div>
                                <div class="h3 text-md-center">￥14.99
                                    <span>/月</span>
                                </div>
                                <div class="text-md-center">
                                    <small class="text-muted ">备注：日常使用足矣...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：60G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>香港，日本，美国，台湾，新加坡，韩国</p>
                            <button type="button" class="btn btn-outline-primary btn-block">升级套餐</button>
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
                            <i class="icon-paper-plane"></i>大流量套餐
                        </div>
                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 text-md-center">大流量版</div>
                                <div class="h3 text-md-center">￥19.99
                                    <span>/月</span>
                                </div>
                                <div class="text-md-center">
                                    <small class="text-muted ">备注：经常追剧，下载东西...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：150G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>香港，日本，美国，台湾，新加坡，韩国</p>
                            <button type="button" class="btn btn-outline-primary btn-block">升级套餐</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection()