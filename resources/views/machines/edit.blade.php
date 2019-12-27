@extends('layouts.app', (['title' => 'Edit Machine']))

@section('content')
@breadcrumb(['header' => 'Edit Machine', 'active' => 'Edit'])
@bcItem(['value' => 'Machine'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card(['header' => ''])<br>

<form role="form" action="{{ route('machines.update', $machines->id_machine) }}" method="POST" class="floating-labels">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $machines->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <span class="bar"></span>
                <small>{{ $machines->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $machines->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <span class="bar"></span>
                <small>{{ $machines->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="form-group col-md-11,5">
        <label>Name</label>
        <input name="name" value="{{ $machines->name }}" type="text" id="id_machine"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10">Update</button>
        <a href="{{ route('machines.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
    </div>
</form>
@endcard

@endsection
