<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header p-2">
                <h5 class="modal-title">{{ $title }}</h5>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x">X</span>
                </div>
            </div>

            <div class="modal-body">
                {{ $body }}
            </div>

            <div class="modal-footer">
                {{ $footer }}
            </div>
            </form>
        </div>
    </div>
</div>
