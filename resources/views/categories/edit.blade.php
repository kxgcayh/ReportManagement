@extends('layouts.app', (['title' => 'Edit Category']))

@section('content')
@breadcrumb(['header' => 'Edit Category', 'active' => 'Edit'])
@bcItem(['value' => 'Category'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card(['header' => ''])<br>

<form role="form" action="{{ route('categories.update', $categories->id_category) }}" method="POST"
    class="floating-labels">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-11,5">
        <label>Name</label>
        <input name="name" value="{{ $categories->name }}" type="text" id="id_category"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard

@endsection
