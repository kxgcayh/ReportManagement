@extends('layouts.app', (['title' => 'Management Type']))
@section('content')
@breadcrumb(['header' => 'Edit Type', 'active' => 'Edit'])
@bcItem(['value' => 'Types'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert

@card(['header' => ''])
<form role="form" action="{{ route('types.update', $types->id_type) }}" method="POST" class="floating-labels">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $types->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <span class="bar"></span>
                <small>{{ $types->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $types->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <span class="bar"></span>
                <small>{{ $types->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label>Type Name</label>
        <input name="name" value="{{ $types->name }}" type="text" id="id_type"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('types.index') }}" class="btn btn-info waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard
</div>
@endsection
