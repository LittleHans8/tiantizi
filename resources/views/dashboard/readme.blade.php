@extends('layouts.blank')

@section('title','使用指南')

@section('main')
    <div class="col-md-12 mb-4" style="margin-top: 48px">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#how_to_buy_code" role="tab" aria-controls="profile"><i
                            class="icon-basket-loaded"></i> 礼品码指南 &nbsp;</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-controls="home"><i
                            class="icon-magic-wand"></i> 客户端配置 </a>
            </li>

        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="how_to_buy_code" role="tabpanel">

            </div>
            <div class="tab-pane" id="profile4" role="tabpanel">
               等待编写:-)
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/libs/marked.js') }}"></script>
    <script>
        $(document).ready(function () {

            $("#how_to_buy_code").html(marked('### 礼品码使用流程\n' +
                '####  介绍 \n' +
                '- 每个礼品码里都有固定的流量和使用时间，兑换后系统会自动配给给你私人的 \n' +
                '   - **多条优质节点线路**(免费用户默认隐藏) \n' +
                '   - **端口号**\n' +
                '   - **密码**\n\n' +
                '![person_info](/img/person_info.png)\n' +
                '![person_node](/img/person_node.png)\n' +
                '#### 如何获取礼品码\n' +
                '- 自助购买，购买中遇到任何困难可以[联系客服](http://wpa.qq.com/msgrd?v=3&uin=3287229704&site=qq&menu=yes) 进行解决:-) \n' +
                '- 不定期的活动\n\n' +
                '####  购买流程\n' +
                '一. 进入天梯子礼品卡自助销售平台：[点击进入](http://t.cn/RShi06g)\n\n' +
                '二. 选择合适自己的套餐\n\n' +
                '![buy_code](/img/buy_code.png)\n\n' +
                '三. 选择支付方式，成功支付后你就会得到一个礼品码\n\n' +
                '![buy_code_success](/img/buy_code_success.png)\n\n' +
                '四. 复制后到 [礼品码兑换页](https://tiantizi.com/user/gift) 兑换就可以了\n\n' +
                '五. Enjoyit :-)'));
            $(document.links).filter(function() {
                return this.hostname != window.location.hostname;
            }).attr('target', '_blank');
        });

    </script>
@endsection

