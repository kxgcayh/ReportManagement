@extends('layouts.master')

@section('title')
    <title>Management Departement</title>
@endsection

@section('content')

@breadcumb(['header' => 'Edit Departement'])
    @breadc_item(['active' => 'Edit'])
        @breadc_active Management Departement @endbreadc_active
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
    @cardbox
        @slot('header')

        @endslot

        @include('inc.ifalert')

        <form role="form" action="{{ route('departement.update', $departements->id_departement) }}" method="POST" class="form-material">
            @method('PUT')
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="id_departement">Nama Departement</label>
                <input id="id_departement" type="text" name="name" required
                    value="{{ $departements->name }}"
                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="location_id">Lokasi</label>
                <select name="location_id" id="location_id" required
                class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
                    <option value=""></option>
                    @foreach ($locations as $locs)
                        <option value="{{ $locs->id_location }}" {{ $locs->id_location == $departements->location_id ? 'selected':'' }}>
                            {{ ucfirst($locs->name) }}
                        </option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('location_id') }}</p>
            </div>
            <div class="form-group col-md-6">
                <button class="btn waves-effect waves-light btn-primary">
                    <i class="fa fa-send"></i> Save
                </button>
                <a href="{{ route('departement.index') }}" class="btn waves-effect waves-light btn-primary">Back </a>
            </div>
        </form>
    @endcardbox
    </div>
</div>
@endsection
