@extends('layouts.app', (['title' => 'Management Category']))

@section('content')
@breadcrumb(['header' => 'Management Category', 'active' => 'Category'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert
@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Category'])
@role('User')
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@else
@modalBtn(['btnClass' => 'warning btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Category Bin'])
@endrole

@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name Category</th>
                <th>Created and Updated By</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($categories as $cats)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $cats->name }}</td>
                <td><label class="badge badge-success">{{ $cats->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $cats->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $cats->id_category) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('categories.edit', $cats->id_category) }}" class="btn btn-warning">
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
                <td colspan="4" class="text-center">Tidak ada data Category</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_categories as $cats)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $cats->name }}</td>
                <td><label class="badge badge-success">{{ $cats->createdBy['name'] }}</label>/<label
                        class="badge badge-warning">{{ $cats->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $cats->id_category) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('categories.edit', $cats->id_category) }}" class="btn btn-warning">
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
                <td colspan="4" class="text-center">Tidak ada data Category</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
@role('Admin|Manager')
{{ $categories->links() }}
@else
{{ $user_categories->links() }}
@endrole

@endcard

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Category'])
<form role="form" action="{{ route('categories.store') }}" method="POST" class="form-material">
    @csrf
    <div class="form-group">
        <input name="name" type="text" id="id_category"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Category Name">
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10 pull-right">Submit</button>
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
            @forelse ($inactive as $cats)
            <tr>
                <td>{{ $cats->name }}</td>
                <td>{{ $cats->createdBy['name'] }}</td>
                <td>{{ $cats->created_at }}</td>
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

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Category Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Category</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $cats)
            <tr>
                <td>{{ $cats->name }}</td>
                <td>{{ $cats->deleted_at }}</td>
                <td>
                    <a href="/categories/restore/{{ $cats->id_category }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/categories/forceDelete/{{ $cats->id_category }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Category</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
