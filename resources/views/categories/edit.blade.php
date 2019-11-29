@extends('layouts.app', (['title' => 'Edit Category']))

@section('content')
@breadcrumb(['header' => 'Edit Category', 'active' => 'Edit'])
    @bcItem(['value' => 'Category'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb

<div class="row">
    <div class="col-md-6">
        @cardbox(['header' => 'Edit Category'])
            @if (session('error'))
                @alert(['type' => 'danger'])
                    {!! session('error') !!}
                @endalert
            @endif​

            <form role="form" action="{{ route('categories.update', $categories->id_category) }}" method="POST" class="form-material">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <input name="name" value="{{ $categories->name }}" type="text" class="form-control" id="id_category" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Category">
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
                </div>
            </form>
        @endcardbox
    </div>
</div>
@endsection
