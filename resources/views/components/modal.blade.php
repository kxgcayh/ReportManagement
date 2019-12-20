<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-{{ $size }}" role="document">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-{{ $color }}">
                <h4 class="modal-title text-white" id="{{ $id }}ModalLabel">{{ $title }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
