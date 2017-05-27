@extends('layouts.blank')

@section('title','礼品兑换')

@section('main')

    <div class="row" style="margin-top: 40px">

        <div class="col-md-4 ui-sortable">
            <div class="row dragdrop">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-handbag"></i>礼品兑换
                        </div>
                        <div class="card-block">
                            <p>同一套餐的礼品码兑换后时间可以延长；</p>
                            <p>如果您兑换的礼品码的流量大于当前套餐的流量，<span class="badge-danger">那么以兑换的礼品流量和时间重新开始计算；</span></p>
                            <form action="/user/gift" method="post" class="form-horizontal ">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md-9">
                                        <input type="text" id="gift_code" name="gift_code" class="form-control"
                                               placeholder="输入您的礼品码">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">兑换礼品</button>
                                {{--<button type="submit" class="btn btn-outline-primary" data-toggle="modal" data-target="#msgModal">兑换礼品</button>--}}
                                <p>{{ $msg }}</p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection()

@component('components.dialog')
    @slot('id') msgModal @endslot
    @slot('type') primary@endslot
    @slot('title') 提示 @endslot
    @slot('body')
        {{ $msg }}
    @endslot
@endcomponent
