@extends('layouts.app', (['title' => 'Management Project']))
@section('content')
@breadcrumb(['header' => 'Edit Project', 'active' => 'Edit'])
@bcItem(['value' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert
@card(['header' => ''])
<form role="form" action="{{ route('projects.update', $projects->id_project) }}" method="POST" class="form-material">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <input name="name" value="{{ $projects->name }}" type="text"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Project Name">
    </div>
    <div class="form-group">
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"
            placeholder="Description">{{ $projects->description }}</textarea>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard

@endsection
