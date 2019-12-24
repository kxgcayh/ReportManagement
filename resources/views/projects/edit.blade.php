@extends('layouts.app', (['title' => 'Management Project']))
@section('content')
@breadcrumb(['header' => 'Edit Project', 'active' => 'Edit'])
@bcItem(['value' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert
@card(['header' => ''])
<form role="form" action="{{ route('projects.update', $projects->id_project) }}" method="POST" class="floating-labels">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $projects->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <span class="bar"></span>
                <small>{{ $projects->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $projects->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <span class="bar"></span>
                <small>{{ $projects->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label>Project Name</label>
        <input name="name" value="{{ $projects->name }}" type="text"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"
            placeholder="Description">{{ $projects->description }}</textarea>
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard

@endsection
