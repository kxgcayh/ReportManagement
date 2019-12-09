@extends('layouts.app', (['title' => 'Management Departement']))

@section('content')

@breadcrumb(['header' => 'Create Departement', 'active' => 'Create'])
@bcItem(['value' => 'Departements'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

<div class="row">
    @cardbox(['header' => ''])
    @ifAlert
    <form role="form" action="{{ route('departements.store') }}" method="post" class="form-material">
        @csrf
        <div class="form-group">
            <label for="id_departement">Nama Departement</label>
            <input id="id_departement" type="text" name="name" required
                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
            <p class="text-danger">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
            <label for="location_id">Lokasi</label>
            <select name="location_id" id="location_id" required
                class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
                <option value=""></option>
                @foreach ($locations as $locs)
                <option value="{{ $locs->id_location }}">{{ ucfirst($locs->name) }}</option>
                @endforeach
            </select>
            <p class="text-danger">{{ $errors->first('location_id') }}</p>
        </div>
        <div class="form-group pull-right">
            <button class="btn waves-effect waves-light btn-primary">
                <i class="fa fa-send"></i> Save
            </button>
            <a href="{{ route('departements.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
        </div>
    </form>
    @endcardbox
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
                @forelse ($departements as $depts)
                <tr>
                    <td>{{ ++$no }}</td>
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
    {{ $departements->links() }}
    @endcardbox
</div>
@endsection
