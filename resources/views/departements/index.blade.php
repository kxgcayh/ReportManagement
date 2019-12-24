@extends('layouts.app', (['title' => 'Management Departement']))

@section('content')

@breadcrumb(['header' => 'Departement List', 'active' => 'View'])
@bcItem(['value' => 'Departements'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Departement'])
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Departement</th>
                <th>Lokasi</th>
                <th>Detail</th>
                <th>Created and Updated By</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($departements as $depts)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $depts->name }}</td>
                <td>{{ $depts->locations['name'] }}</td>
                <td>{{ str_limit($depts->locations['description'], 50) }}</td>
                <td><label class="badge badge-success">{{ $depts->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $depts->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('departements.destroy', $depts->id_departement) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('departements.edit', $depts->id_departement) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data De
                <th>partemen</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_departements as $depts)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $depts->name }}</td>
                <td>{{ $depts->locations['name'] }}</td>
                <td>{{ str_limit($depts->locations['description'], 40) }}</td>
                <td><label class="badge badge-success">{{ $depts->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $depts->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('departements.destroy', $depts->id_departement) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('departements.edit', $depts->id_departement) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Departemen</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
    @role('Admin|Manager')
    {{ $departements->links() }}
    @else
    {{ $user_departements->links() }}
    @endrole
</div>
@endcard

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Departement'])
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
@endmodal

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Category</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inactive as $depts)
            <tr>
                <td>{{ $depts->name }}</td>
                <td>{{ $depts->createdBy['name'] }}</td>
                <td>{{ $depts->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Category</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
