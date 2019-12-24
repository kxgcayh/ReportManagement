@extends('layouts.app', (['title' => 'Management Production']))
@section('content')
@breadcrumb(['header' => 'Production List', 'active' => 'View'])
@bcItem(['value' => 'Productions'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Production'])
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produksi</th>
                <th>Lokasi</th>
                <th>Detail</th>
                <th>Created and Updated By</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($productions as $prods)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $prods->name }}</td>
                <td>{{ $prods->locations['name'] }}</td>
                <td>{{ str_limit($prods->locations['description'], 15) }}</td>
                <td><label class="badge badge-success">{{ $prods->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $prods->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{route('productions.destroy',[$prods->id_production])}}" method="POST">
                        @method('DELETE') @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('productions.edit', [$prods->id_production]) }}" class="btn btn-warning">
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
                <td colspan="5" class="text-center">Tidak ada data Produksi</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_productions as $prods)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $prods->name }}</td>
                <td>{{ $prods->locations['name'] }}</td>
                <td>{{ str_limit($prods->locations['description'], 15) }}</td>
                <td><label class="badge badge-success">{{ $prods->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $prods->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{route('productions.destroy',[$prods->id_production])}}" method="POST">
                        @method('DELETE') @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('productions.edit', [$prods->id_production]) }}" class="btn btn-warning">
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
                <td colspan="5" class="text-center">Tidak ada data Produksi</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
@role('Admin|Manager')
{{ $productions->links() }}
@else
{{ $user_productions->links() }}
@endrole
@endcard

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Data Brand'])
<form role="form" action="{{ route('productions.store') }}" method="post" class="form-material">
    @csrf
    <div class="form-group">
        <input id="id_production" type="text" name="name" required
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Nama Tempat Produksi">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <select name="location_id" id="location_id" required
            class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
            <option></option>
            @foreach ($locations as $locs)
            <option value="{{ $locs->id_location }}">{{ ucfirst($locs->name) }}</option>
            @endforeach
        </select>
        <small class="form-control-feedback"> Select Location </small>
        <p class="text-danger">{{ $errors->first('location_id') }}</p>
    </div>
    <div class="form-group col-md-6">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
        <a href="{{ route('productions.index') }}" class="btn waves-effect waves-light btn-primary">Back </a>
    </div>
</form>
@endmodal

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Created By</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inactive as $production)
        <tr>
            <td>{{ $production->name }}</td>
            <td>{{ $production->detail }}</td>
            <td>{{ $production->createdBy['name'] }}</td>
            <td>{{ $production->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Semua data sudah di approve</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endmodal

@endsection
