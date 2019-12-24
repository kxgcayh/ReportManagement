@extends('layouts.app', (['title' => 'Management Production']))

@section('content')

@breadcrumb(['header' => 'Edit Production', 'active' => 'Edit'])
@bcItem(['value' => 'Productions'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card(['header' => ''])
<form role="form" action="{{ route('productions.update', $productions->id_production) }}" method="POST"
    class="floating-labels">
    @method('PUT')
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $productions->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <small>{{ $productions->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $productions->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <small>{{ $productions->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="form-group col-md-11,5">
        <label for="id_production">Production Name</label>
        <input id="id_production" type="text" name="name" required value="{{ $productions->name }}"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group col-md-11,5">
        <label for="location_id">Location</label>
        <select name="location_id" id="location_id" required
            class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
            <option value=""></option>
            @foreach ($locations as $locs)
            <option value="{{ $locs->id_location }}"
                {{ $locs->id_location == $productions->location_id ? 'selected':'' }}>
                {{ ucfirst($locs->name) }}
            </option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('location_id') }}</p>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
        <a href="{{ route('productions.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
    </div>
    @endcard
    @endsection
