@extends('layouts.app')

@section('title')
<title>Management Departement</title>
@endsection

@section('content')

@breadcumb(['header' => 'Create Departement'])
@breadc_item(['active' => 'Create'])
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

        <form role="form" action="{{ route('departements.store') }}" method="post" class="form-material">
            @csrf
            <div class="form-group">
                <label for="id_departement">Nama Departement</label>
                <input id="id_departement" type="text" name="name" required class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="location_id">Lokasi</label>
                <select name="location_id" id="location_id" required class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
                    <option value=""></option>
                    @foreach ($locations as $locs)
                    <option value="{{ $locs->id_location }}">{{ ucfirst($locs->name) }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('location_id') }}</p>
            </div>
            <div class="form-group col-md-6">
                <button class="btn waves-effect waves-light btn-primary">
                    <i class="fa fa-send"></i> Save
                </button>
                <a href="{{ route('departements.index') }}" class="btn waves-effect waves-light btn-primary">Back </a>
            </div>
        </form>
        @endcardbox
    </div>
    <div class="col-md-6">
        @cardbox(['header' => 'List Departement'])
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Departement</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($departements as $depts)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $depts->name }}</td>
                        <td>{{ $depts->location['name'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data Lokasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endcardbox
    </div>
</div>
@endsection
