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
                    <table class="table table-striped table-bordered datatable dataTable no-footer table-responsive"
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
                            <th hidden class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1"
                                aria-label="Actions: activate to sort column ascending">
                                port
                            </th>
                            <th hidden class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                colspan="1"
                                aria-label="Actions: activate to sort column ascending">
                                passwd
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($nodes))
                            @foreach($nodes as $node)
                                <tr role="row">
                                    <td id="node_name" class="sorting_1">{{ $node->name }}</td>
                                    <td id="node_domain">{{ $node->domain }}</td>
                                    <td id="node_method">{{ $node->method  }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ $node->status }}</span>
                                    </td>
                                    <td>

                                        <a id="btn_detail" class="btn btn-secondary" href="#" data-id="{{ $node->id }}"
                                           data-toggle="modal" data-target="#detailModal">
                                            <i class="fa fa-search-plus"></i>
                                        </a>

                                        <a id="btn_qrcode" class="btn btn-primary" href="#" data-id="{{ $node->id }}"
                                           data-toggle="modal"
                                           data-target="#qrcodeModal">
                                            <i class="fa fa-qrcode"></i>
                                        </a>

                                        <a id="btn_android" class="btn btn-success" href="#" data-toggle="modal"
                                           data-target="#androidModal">
                                            <i class="fa fa-android"></i>
                                        </a>
                                    </td>
                                    <td hidden id="node_port">{{ $user->port }}</td>
                                    <td hidden id="node_passwd">{{ $user->passwd }}</td>
                                </tr>
                            @endforeach
                        @endif

                        @if(!empty($free_nodes))
                            @foreach($free_nodes as $free_node)
                                <tr role="row">
                                    <td id="node_name" class="sorting_1">{{ $free_node->name }}</td>
                                    <td id="node_domain">{{ $free_node->domain }}</td>
                                    <td id="node_method">{{ $free_node->method  }}</td>
                                    <td>
                                        <span class="badge badge-success">{{ $free_node->status }}</span>
                                    </td>
                                    <td>

                                        <a id="btn_detail" class="btn btn-secondary" href="#"
                                           data-toggle="modal" data-target="#detailModal">
                                            <i class="fa fa-search-plus"></i>
                                        </a>

                                        <a id="btn_qrcode" class="btn btn-primary" href="#"
                                           data-toggle="modal"
                                           data-target="#qrcodeModal">
                                            <i class="fa fa-qrcode"></i>
                                        </a>

                                        <a id="btn_android" class="btn btn-success" href="#" data-toggle="modal"
                                           data-target="#androidModal">
                                            <i class="fa fa-android"></i>
                                        </a>
                                    </td>
                                    <td hidden id="node_port">{{ $free_node->port }}</td>
                                    <td hidden id="node_passwd">{{ $free_node->passwd }}</td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @component('components.dialog')
            @slot('id') detailModal @endslot
            @slot('type') secondary   @endslot
            @slot('title') 详细配置 @endslot
            @slot('body')
                <p id="p_domain">服务器地址：<span id="i_domain"></span></p>
                <p id="p_port">服务器端口：<span id="i_port"></span></p>
                <p id="p_password">密码：<span id="i_passwd"></span></p>
                <p id="p_method">加密方式：<span id="i_method"></span></p>
            @endslot
        @endcomponent

        @component('components.dialog')
            $(this).
            @slot('id') qrcodeModal @endslot
            @slot('type') primary   @endslot
            @slot('title') PC(电脑端)配置二维码 @endslot
            @slot('body')
                <i class="badge-info">提示：</i>
                <p>找到系统任务栏图标->点击鼠标右键->找到“服务器”->点击“扫描屏幕上的二维码...”</p>
                <div id="qrcode"></div>

            @endslot
        @endcomponent

        @component('components.dialog')
            @slot('id') androidModal @endslot
            @slot('type') success @endslot
            @slot('title') Android 配置 @endslot
            @slot('body')
                如果按下按钮后您的浏览器没有自动跳转，则证明您的浏览器不支持自动跳转，请手动配置
                <div class="input-group">
                    <input id="input_ssurl" type="text" class="form-control">
                    <div class="input-group-btn">
                        <a id="ssurl" class="btn btn-success icon-cursor"></a>
                    </div>
                </div>
            @endslot
        @endcomponent
    </div>

@endsection


@section('script')

    <script src="{{ asset('js/libs/qrcode.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn-secondary").click(function () {
                var $tr = $(this).closest("tr");
                var $name = $tr.find("#node_name").text();
                var $domain = $tr.find("#node_domain").text();
                var $port = $tr.find("#node_port").text();
                var $passwd = $tr.find("#node_passwd").text();
                var $method = $tr.find("#node_method").text();
                $("#i_domain").text($domain);
                $("#i_port").text($port);
                $("#i_passwd").text($passwd);
                $("#i_method").text($method);
            });

            $(".btn-primary").click(function () {
                $("#qrcode").empty();
                var $tr = $(this).closest("tr");
                var $domain = $tr.find("#node_domain").text();
                var $port = $tr.find("#node_port").text();
                var $passwd = $tr.find("#node_passwd").text();
                var $method = $tr.find("#node_method").text();
                var qrcode = new QRCode("qrcode");
                // method:password@hostname:port
                {{--var $js_user = {!! json_encode($user->toArray()) !!};--}} // pass from laravel to js
                var $ssurl = "ss://" + btoa($method + ":" + $passwd + "@" + $domain + ":" + $port);
                qrcode.makeCode($ssurl);
            });

            $(".btn-success#btn_android").click(function () {
                var $tr = $(this).closest("tr");
                var $domain = $tr.find("#node_domain").text();
                var $port = $tr.find("#node_port").text();
                var $passwd = $tr.find("#node_passwd").text();
                var $method = $tr.find("#node_method").text();

                var $ssurl = "ss://" + btoa($method + ":" + $passwd + "@" + $domain + ":" + $port);
                $("#input_ssurl").val($ssurl);
                $("a#ssurl").attr('href', $ssurl);
            });
        });
    </script>
@endsection