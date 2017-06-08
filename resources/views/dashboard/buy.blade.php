@extends('layouts.blank')


@section('title','购买服务')

@section('main')

    <div class="row" style="margin-top: 40px">

        <div class="col-md-4 ui-sortable">
            <div class="row dragdrop">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-paper-plane"></i>略小流量版
                        </div>

                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 text-md-center">略小流量套餐</div>
                                <div class="h4 text-md-center">￥6.66
                                    <span>/月</span>
                                </div>
                                <div class="h3 text-md-center">￥70.00
                                    <span>/年</span>
                                </div>

                                <div class="text-md-center">
                                    <small class="text-muted ">备注：不经常看视频，下载东西...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：10G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>新加波(CN2电信优化)，美国(电信优化)，日本</p>
                            <button data-toggle="modal"
                                    data-target="#jump_to_buy" type="button" class="btn btn-outline-primary btn-block">
                                购买套餐
                            </button>
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
                            <i class="icon-paper-plane"></i>小流量套餐
                        </div>

                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 text-md-center">小流量版</div>

                                <div class="h4 text-md-center">￥9.99
                                    <span>/月</span>
                                </div>
                                <div class="h3 text-md-center">￥100.00
                                    <span>/年</span>
                                </div>

                                <div class="text-md-center">
                                    <small class="text-muted ">备注：日常使用足矣...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：30G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>新加波(CN2电信优化)，美国(电信优化)，日本</p>
                            <button data-toggle="modal"
                                    data-target="#jump_to_buy" type="button" class="btn btn-outline-primary btn-block">
                                购买套餐
                            </button>
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
                            <i class="icon-paper-plane"></i>中流量套餐
                        </div>
                        <div class="card card-inverse card-info">
                            <div class="card-block">
                                <div class="h4 text-md-center">中流量版</div>
                                <div class="h4 text-md-center">￥19.9
                                    <span>/月</span>
                                </div>
                                <div class="h3 text-md-center">￥200.00
                                    <span>/年</span>
                                </div>
                                <div class="text-md-center">
                                    <small class="text-muted ">备注：经常追剧，下载东西...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：100G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>新加波(CN2电信优化)，美国(电信优化)，日本</p>
                            <button data-toggle="modal"
                                    data-target="#jump_to_buy" type="button" class="btn btn-outline-primary btn-block">
                                购买套餐
                            </button>
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
                                <div class="h4 text-md-center">￥29.99
                                    <span>/月</span>
                                </div>
                                <div class="h3 text-md-center">￥290.00
                                    <span>/年</span>
                                </div>
                                <div class="text-md-center">
                                    <small class="text-muted ">备注：经常追剧，下载东西...</small>
                                </div>
                            </div>
                        </div>

                        <div class="card-block">
                            <p>月流量：200G</p>
                            <p>在线人数：仅限个人使用</p>
                            <p>多国机房：多条线路可切换</p>
                            <hr>
                            <p>新加波(CN2电信优化)，美国(电信优化)，日本</p>
                            <button data-toggle="modal"
                                    data-target="#jump_to_buy" type="button" class="btn btn-outline-primary btn-block">
                                购买套餐
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

@component('components.dialog_jump_to')
    @slot('id') jump_to_buy @endslot
    @slot('type') primary   @endslot
    @slot('title') 购买须知 @endslot
    @slot('body')
        <p style="color: red;">以下操作涉及您切身利益，请认真查看</p>
        <p>每一个礼品码都代表着固定的流量以及使用时间；</p>
        <p>同一套餐的礼品码兑换后时间可以延长；</p>
        <p>如果您兑换的礼品码的流量大于当前套餐的流量，<span class="badge-danger">那么以兑换的礼品码里的流量和时间重新开始计算；</span></p>
    @endslot

    @slot('jump_to_href')
        http://t.cn/RShi06g
    @endslot

    @slot('jump_to_title')
        前往购买
    @endslot
@endcomponent