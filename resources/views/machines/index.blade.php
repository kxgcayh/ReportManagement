@extends('layouts.app', (['title' => 'Management Machine']))

@section('content')
@breadcrumb(['header' => 'Management Machine', 'active' => 'Machine'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert
@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Machine'])
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
                <th>Name Machine</th>
                <th>Latest By</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($machines as $macs)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $macs->name }}</td>
                <td>
                    @if($macs->updatedBy['name'] == null)
                    <label class="badge badge-info">{{ $macs->createdBy['name'] }}</label>
                    @else
                    <label class="badge badge-info">{{ $macs->updatedBy['name'] }}</label>
                    @endif
                </td>
                <td>
                    <form action="{{ route('machines.destroy', $macs->id_machine) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('machines.edit', $macs->id_machine) }}" class="btn btn-warning">
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
                <td colspan="4" class="text-center">Tidak ada data Mesin</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_machines as $macs)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $macs->name }}</td>
                <td><label class="badge badge-success">{{ $macs->createdBy['name'] }}</label>/<label
                        class="badge badge-warning">{{ $macs->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('machines.destroy', $macs->id_machine) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('machines.edit', $macs->id_machine) }}" class="btn btn-warning">
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
                <td colspan="4" class="text-center">Tidak ada data Machine</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
@role('Admin|Manager')
{{ $machines->links() }}
@else
{{ $user_machines->links() }}
@endrole

@endcard

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Machine'])
<form role="form" action="{{ route('machines.store') }}" method="POST" class="form-material">
    @csrf
    <div class="form-group">
        @can('Manage Categories')
        <input name="name" type="text" id="id_machine" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
            placeholder="Machine Name">
        @else
        <input name="name" type="text" id="id_machine" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
            placeholder="Machine Name" disabled>
        @endcan
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10 pull-right">Submit</button>
</form>
@endmodal

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Machine Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Machine</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $macs)
            <tr>
                <td>{{ $macs->name }}</td>
                <td>{{ $macs->deleted_at }}</td>
                <td>
                    <a href="/machines/restore/{{ $macs->id_machine }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/machines/forceDelete/{{ $macs->id_machine }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Mesin</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
