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
                            <form action="" method="post" class="form-horizontal ">
                                <div class="form-group row">
                                    <div class="col-md-9">
                                        <input type="text" id="gift_code" name="gift_code" class="form-control"
                                               placeholder="输入您的礼品码">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary">兑换礼品</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

<div class="modal fade" id="qrcodeModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">提示</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                 <p>兑换成功/失败</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>