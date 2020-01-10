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
