@extends('layouts.app', (['title' => 'Management Type']))
@section('content')
@breadcrumb(['header' => 'Management Type', 'active' => 'View'])
@bcItem(['value' => 'Types'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Type'])
@role('User')
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@else
@modalBtn(['btnClass' => 'warning btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Type Bin'])
@endrole
@endslot
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name Type</th>
                <th>Created and Updated By</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($types as $type)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $type->name }}</td>
                <td><label class="badge badge-success">{{ $type->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $type->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('types.destroy', $type->id_type) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('types.edit', $type->id_type) }}" class="btn btn-warning btn-sm">
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
                <td colspan="4" class="text-center">Tidak ada data Type</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_types as $type)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $type->name }}</td>
                <td><label class="badge badge-success">{{ $type->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $type->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('types.destroy', $type->id_type) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('types.edit', $type->id_type) }}" class="btn btn-warning btn-sm">
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
                <td colspan="4" class="text-center">Tidak ada data Type</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
@role('Admin|Manager')
{{ $types->links() }}
@else
{{ $user_types->links() }}
@endrole

@endcard

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Type'])
<form role="form" action="{{ route('types.store') }}" method="POST" class="form-material">
    @csrf
    <div class="form-group">
        @can('Manage Types')
        <input name="name" type="text" id="id_type" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
            placeholder="Type Name">
        @else
        <input name="name" type="text" id="id_type" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
            placeholder="Type Name" disabled>
        @endcan
    </div>
    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
</form>
@endmodal

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Type</th>
                <th>Created By</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inactive as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>{{ $type->createdBy['name'] }}</td>
                <td>{{ $type->created_at }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data Type</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Type Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Type</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>{{ $type->deleted_at }}</td>
                <td>
                    <a href="/types/restore/{{ $type->id_type }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/types/forceDelete/{{ $type->id_type }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Type</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
