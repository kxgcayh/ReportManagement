@extends('layouts.app', (['title' => 'Management Departement']))

@section('content')
@breadcrumb(['header' => 'Edit Departement', 'active' => 'Edit'])
@bcItem(['value' => 'Departements'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card(['header' => ''])
<form role="form" action="{{ route('departements.update', $departements->id_departement) }}" method="POST"
    class="floating-labels">
    @method('PUT')
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $departements->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <span class="bar"></span>
                <small>{{ $departements->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $departements->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <span class="bar"></span>
                <small>{{ $departements->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label for="id_departement">Nama Departement</label>
        <input id="id_departement" type="text" name="name" required value="{{ $departements->name }}"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <span class="bar"></span>
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <label for="location_id">Lokasi</label>
        <select name="location_id" id="location_id" required
            class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
            <option value=""></option>
            @foreach ($locations as $locs)
            <option value="{{ $locs->id_location }}"
                {{ $locs->id_location == $departements->location_id ? 'selected':'' }}>
                {{ ucfirst($locs->name) }}
            </option>
            @endforeach
        </select>
        <span class="bar"></span>
        <p class="text-danger">{{ $errors->first('location_id') }}</p>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
        <a href="{{ route('departements.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
    </div>
</form>
@endcard

@endsection
