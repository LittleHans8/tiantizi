@extends('layouts.blank')

@section('title','节点列表')

@section('main')
    <div class="row" style="margin-top: 40px">

        <div class="col-sm-10 col-md-10">
            <div class="card card-accent-primary">
                <div class="card-header">
                    <i class="icon-bulb"></i>节点公告
                </div>
                <div class="card-block">
                    <span class="badge-danger">为了更加稳定的服务：请勿在任何场合公开以下节点</span><br>
                    特别声明:
                    使用本服务必须遵守当地相关法律法规;
                    严禁使用本网络进行网络攻击、垃圾邮箱发送、Spam、P2P下载、BT版权下载及所有国家法律所不允许的非法活动
                </div>
            </div>
        </div>

        <div class="card" style="margin-left: 15px;">
            <div class="card-header">
                <i class="icon-paper-plane"></i>节点列表
                <div class="card-actions">
                    <a href="http://l-lin.github.io/angular-datatables/#/gettingStarted">
                        <small class="text-muted">天梯子</small>
                    </a>
                </div>
            </div>
            <div class="card-block">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap4 no-footer">
                    <div class="row mb-1">
                        <div class="col-sm-6">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    选择您的运营商&nbsp;
                                    <select
                                            name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                            class="form-control input-sm">
                                        <option value="0">电信</option>
                                        <option value="1">联通</option>
                                        <option value="2">移动</option>
                                        <option value="3">其他</option>
                                    </select>
                                </label></div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered datatable dataTable no-footer"
                           id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1" aria-sort="ascending"
                                aria-label="Username: activate to sort column descending" style="width: 253px;">
                                节点名字
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Date registered: activate to sort column ascending" style="width: 185px;">
                                节点地址
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Role: activate to sort column ascending" style="width: 102px;">
                                加密方式
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Status: activate to sort column ascending" style="width: 107px;">
                                状态
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="Actions: activate to sort column ascending" style="width: 249px;">
                                连接
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($nodes as $node)
                            <tr role="row">
                                <td class="sorting_1">{{ $node->name }}</td>
                                <td>{{ $node->domain }}</td>
                                <td>{{ $node->method  }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $node->status }}</span>
                                </td>
                                <td>

                                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#detailModal">
                                        <i class="fa fa-search-plus"></i>
                                    </a>

                                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#qrcodeModal">
                                        <i class="fa fa-qrcode"></i>
                                    </a>

                                    <a class="btn btn-success" href="#">
                                        <i class="fa fa-android"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@component('components.dialog')
    @slot('id') qrcodeModal @endslot
    @slot('type') primary   @endslot
    @slot('title') PC(电脑端)配置二维码 @endslot
    @slot('body')
        <i class="badge-info">提示：</i>
        <p>找到系统任务栏图标->点击鼠标右键->找到“服务器”->点击“扫描屏幕上的二维码...”</p>

        <input id="text" type="text" value="chacha20:password@hostname:1234" style="width:80%"/><br/>
        <div id="qrcode"></div>

    @endslot
@endcomponent

@component('components.dialog')
    @slot('id') detailModal @endslot
    @slot('type') success   @endslot
    @slot('title') 详细配置 @endslot
    @slot('body')
        <i class="badge-info">提示：</i> <p>详细配置...”</p>
    @endslot
@endcomponent

@section('script')

    <script src="{{ asset('js/libs/qrcode.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var qrcode = new QRCode("qrcode");

            function makeCode() {
                var elText = document.getElementById("text");
                if (!elText.value) {
                    alert("Input a text");
                    elText.focus();
                    return;
                }
                var ssurl = "ss://" + btoa(elText.value);
                qrcode.makeCode(ssurl);
            }

            makeCode();

            $("#text").on("blur", function () {
                makeCode();
            }).on("keydown", function (e) {
                if (e.keyCode == 13) {
                    makeCode();
                }
            });
        });
    </script>
@endsection