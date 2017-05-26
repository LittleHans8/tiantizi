<div class="modal fade" id="{{ $id }}" tabindex="1" role="dialog" aria-labelledby="myModalLabel"
     style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-{{ $type }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $body }}
            </div>
            <div class="modal-footer">
                <a  href="{{ $jump_to_href }}" class="btn btn-primary" target="_blank"> {{ $jump_to_title }}</a>
            </div>
        </div>
    </div>
</div>