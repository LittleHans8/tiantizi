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
                            <p>支持我们请<a href="/user/buy">购买</a>付费的套餐:-)</p>
                            @endrole

                            <a class="btn btn-outline-primary" href="/user/buy">升级套餐</a>

                            @role('free')
                            <button data-toggle="modal" data-target="#support_us" type="button"
                                    class="btn btn-outline-primary">支持我们
                            </button>
                            @endrole()
                            <a class="btn btn-outline-primary" href="https://jq.qq.com/?_wv=1027&k=4ALslNA">交流群</a>
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
                            <p style="color: red">现在购买套餐，买多久送多久，购买后请联系管理员帮你延长使用时间:-)</p>
                            <p>有任何问题请联系qq哦</p>
                            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=3287229704&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:3287229704:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@component('components.dialog')
    @slot('id') support_us @endslot
    @slot('type') primary   @endslot
    @slot('title') 支持我们 @endslot
    @slot('body')
        <p style="color: dodgerblue">出于稳定性考虑，我们会对免费的服务器进行不定期的更换域名，端口号，或密码；如果您发现使用不了，请重新登陆账号查询</p>
        <p>
            免费服务的受众(不需要长期使用大量带宽)是为那些没有独立经济的人(学生党/没有工作的人等等)
            或只需要查阅一些文档资料的人提供一点小小的帮助:-)
        </p>

        <p>对于免费的服务器，我们默认最高限速为 100KB/s（这个速度足以浏览普通网页,如果对带宽有更高的要求，请<a href="/user/buy">购买</a>付费的套餐:-)</p>
        <p>为了免费的公益服务能够稳定的发展下去，请您在使用服务遵循以下规定：<span style="color: red">(划重点)</span></p>
        <p>1.不要长期占用免费公共资源，在需要时再去连接;</p>
        <p>2.不要在任何场合公开免费服务的域名，端口以及密码;</p>
        <p>3.使用免费服务时必须遵守当地相关法律法规; 严禁使用本网络进行网络攻击、垃圾邮箱发送、Spam、P2P下载、BT版权下载及所有国家法律所不允许的非法活动</p>
        <p style="color: red">
            如果因您一个人的不当操作，导致整个免费服务器被封，那么牵连的是全部使用公共服务的人，那么我们也无能为力，只能暂停免费公益性的服务；相信您不会成为那个被万人唾弃的人:-)
        </p>

    @endslot
@endcomponent
