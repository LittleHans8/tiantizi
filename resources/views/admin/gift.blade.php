@extends('layouts.blank')

@section('title','礼品码管理')

@section('main')
    <div class="row" style="margin-top: 40px">

        <div class="card" style="margin-left: 15px;">
            <div class="card-header">
                <i class="icon-paper-plane"></i>礼品码管理
                <div class="card-actions">
                    <a href="http://l-lin.github.io/angular-datatables/#/gettingStarted">
                        <small class="text-muted">天梯子</small>
                    </a>
                </div>
            </div>
            <div class="card-block">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal_generate_code" >添加礼品卡</button>
            </div>

        </div>
    </div>

@endsection

@component('components.dialog_jump_to')
    @slot('id') modal_generate_code @endslot
    @slot('type') primary   @endslot
    @slot('title') 生成礼品码 @endslot
    @slot('body')
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <strong>Credit Card</strong>
                    <small>Form</small>
                </div>
                <div class="card-block">
                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name">
                            </div>

                        </div>

                    </div>
                    <!--/.row-->

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label for="ccnumber">Credit Card Number</label>
                                <input type="text" class="form-control" id="ccnumber" placeholder="0000 0000 0000 0000">
                            </div>

                        </div>

                    </div>
                    <!--/.row-->

                    <div class="row">

                        <div class="form-group col-sm-4">
                            <label for="ccmonth">Month</label>
                            <select class="form-control" id="ccmonth">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="ccyear">Year</label>
                            <select class="form-control" id="ccyear">
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>

                        <div class="col-sm-4">

                            <div class="form-group">
                                <label for="cvv">CVV/CVC</label>
                                <input type="text" class="form-control" id="cvv" placeholder="123">
                            </div>

                        </div>

                    </div>
                    <!--/.row-->
                </div>
            </div>

        </div>
    @endslot

    @slot('jump_to_href')
        http://t.cn/RShi06g
    @endslot

    @slot('jump_to_title')
        确定生成
    @endslot
@endcomponent