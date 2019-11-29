<div class="card {{ $widget }}-widget">
    <div class="card-header">
        <div class="card-actions">
            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
            <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
        </div>
        <h4 class="card-title m-b-0">{{ $title }}</h4>
    </div>
    <div class="card-body b-t collapse hide">
        {{ $slot }}
    </div>
</div>

{{-- Example Usage
    @cwidget(['widget' => 'create', 'title' => 'Create Project'])
    @endcwidget
    --}}
