@extends('layouts.blank')

@section('title','用户中心')

@section('main')

    <div class="row" style="margin-top: 40px">

        <div class="col-md-4 ui-sortable">
            <div class="row">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            <i class="icon-bulb"></i>公告
                        </div>
                        <div class="card-block">
                            公告信息
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
                                <div class="h4 m-0">10 GB</div>
                                <div>共使用 3GB...</div>
                                <div class="progress progress-white progress-xs my-1">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
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
            <div class="row dragdrop">
                <div class="col-md-12 ui-sortable">
                    <div class="card card-accent-info">
                        <div class="card-header">
                            Drag &amp; Drop Card
                        </div>
                        <div class="card-block">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex
                            ea commodo consequat.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection