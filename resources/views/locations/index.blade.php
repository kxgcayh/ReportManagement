@extends('layouts.app', (['title' => 'Management Locations']))
@section('content')
@breadcrumb(['header' => 'Management Locations', 'active' => 'Locations'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Location'])
@role('User')
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@else
@modalBtn(['btnClass' => 'warning btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Location Bin'])
@endrole

@endslot
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lokasi</th>
                <th>Deskripsi</th>
                <th>Latest By</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($locations as $locs)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $locs->name }}</td>
                <td>{{ str_limit($locs->description, 40) }}</td>
                <td>
                    @if($locs->updatedBy['name'] == null)
                    <label class="badge badge-info">{{ $locs->createdBy['name'] }}</label>
                    @else
                    <label class="badge badge-info">{{ $locs->updatedBy['name'] }}</label>
                    @endif
                </td>
                <td>
                    <form action="{{ route('locations.destroy', $locs->id_location) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('locations.edit', $locs->id_location) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Lokasi</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_locations as $locs)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $locs->name }}</td>
                <td>{{ $locs->description }}</td>
                <td><label class="badge badge-success">{{ $locs->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $locs->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('locations.destroy', $locs->id_location) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('locations.edit', $locs->id_location) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Lokasi</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
@role('Admin|Manager')
{{ $locations->links() }}
@else
{{ $user_locations->links() }}
@endrole

@endcard

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Category'])
<form role="form" action="{{ route('locations.store') }}" method="POST" class="form-material">
    @csrf
    @can('Manage Locations')
    <div class="form-group">
        <input name="name" type="text" id="id_location"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Location Name">
    </div>
    <div class="form-group">
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"
            placeholder="Location Detail"></textarea>
    </div>
    @else
    <div class="form-group">
        <input name="name" type="text" id="id_location"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Location Name" disabled>
    </div>
    <div class="form-group">
        <textarea name="description" id="description" cols="5" rows="5"
            class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" placeholder="Location Detail"
            disabled></textarea>
    </div>
    @endcan
    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
</form>
@endmodal

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Location</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inactive as $locs)
            <tr>
                <td>{{ $locs->name }}</td>
                <td>{{ $locs->createdBy['name'] }}</td>
                <td>{{ $locs->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Lokasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Location Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Location</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $locs)
            <tr>
                <td>{{ $locs->name }}</td>
                <td>{{ $locs->deleted_at }}</td>
                <td>
                    <a href="/locations/restore/{{ $locs->id_location }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/locations/forceDelete/{{ $locs->id_location }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Lokasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
