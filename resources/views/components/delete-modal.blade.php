<div class="modal fade" id="modalDelete" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ $url }}" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('delete_confirm') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    {{ __('do_you_want_delete_this_item') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal" aria-label="Close">{{ __('cancel') }}</button>
                    <button type="submit" class="btn btn-primary" id="btnDeleteConfirmOK">{{ __('OK') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
