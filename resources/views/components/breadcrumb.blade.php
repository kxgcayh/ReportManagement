<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ $header }}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="javascript:void(0)">
                    {{ $active }}
                </a>
            </li>
            {{ $slot }}
        </ol>
    </div>
</div>

{{-- Example Usage
    @breadcrumb(['header' => 'Management Category', 'active' => 'Edit'])
        @bc_item Category @endbc_item
        @bc_item Data Master @endbc_item
    @endbreadcrumb
    --}}
