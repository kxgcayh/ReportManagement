@if ($errors->any())
    @alert(['type' => 'danger'])
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endalert
@elseif (session('success'))
    @alert(['type' => 'success'])
        {!! session('success') !!}
    @endalert
@elseif (session('warning'))
    @alert(['type' => 'warning'])
        {!! session('warning') !!}
    @endalert
@endif
