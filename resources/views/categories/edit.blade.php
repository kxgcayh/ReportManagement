@extends('layouts.app')

@section('title')
    <title>Edit Category</title>
@endsection

@section('content')
@breadcumb(['header' => 'Edit Category'])
    @breadc_item(['active' => 'Edit'])
    @breadc_active Category @endbreadc_active
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox(['header' => 'Edit Category'])
            @if (session('error'))
                @alert(['type' => 'danger'])
                    {!! session('error') !!}
                @endalert
            @endif​

            <form role="form" action="{{ route('categories.update', $categories->id_type) }}" method="POST" class="floating-labels">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="id_category">Category</label>
                    <input name="name" value="{{ $categories->name }}" type="text" class="form-control" id="id_category" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                    <button href="{{ route('categories.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</button>
                </div>
            </form>
        @endcardbox
    </div>
</div>
@endsection
