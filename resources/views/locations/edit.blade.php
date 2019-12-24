@extends('layouts.app', (['title' => 'Edit Locations']))
@section('content')
@breadcrumb(['header' => 'Edit Location', 'active' => 'Edit'])
@bcItem(['value' => 'Location'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card(['header' => ''])
<form role="form" action="{{ route('locations.update', $locations->id_location) }}" method="POST"
    class="floating-labels">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $locations->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <span class="bar"></span>
                <small>{{ $locations->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $locations->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <span class="bar"></span>
                <small>{{ $locations->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label>Name Location</label>
        <input name="name" value="{{ $locations->name }}" type="text" class="form-control" id="id_location"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $locations->description }}</textarea>
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('locations.index') }}" class="btn btn-info waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard
@endsection
