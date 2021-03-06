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
@role('Manager')
@modalBtn(['btnClass' => 'warning btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Recycle Bin'])
@endrole
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produksi</th>
                <th>Lokasi</th>
                <th>Detail</th>
                <th>Latest By</th>
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
                <td>
                    @if($prods->updatedBy['name'] == null)
                    <label class="badge badge-info">{{ $prods->createdBy['name'] }}</label>
                    @else
                    <label class="badge badge-info">{{ $prods->updatedBy['name'] }}</label>
                    @endif
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

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Production Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Production</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $prods)
            <tr>
                <td>{{ $prods->name }}</td>
                <td>{{ $prods->deleted_at }}</td>
                <td>
                    <a href="/productions/restore/{{ $prods->id_production }}"
                        class="btn btn-success btn-sm">Restore</a>
                    <a href="/productions/forceDelete/{{ $prods->id_production }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Produksi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
