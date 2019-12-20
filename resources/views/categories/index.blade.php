@extends('layouts.app', (['title' => 'Management Category']))

@section('content')
@breadcrumb(['header' => 'Management Category', 'active' => 'Category'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert
@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-information-outline',
'name' => 'Create Category'])
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
{{ $categories->links() }}
@endcard

@modal(['id' => 'create', 'size' => 'lg', 'color' => 'primary', 'title' => 'Create Category'])
<form role="form" action="{{ route('categories.store') }}" method="POST" class="form-material">
    @csrf
    <div class="form-group">
        @can('Manage Categories')
        <input name="name" type="text" id="id_category"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Category Name">
        @else
        <input name="name" type="text" id="id_category"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Category Name" disabled>
        @endcan
    </div>
    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
</form>
@endmodal

@endsection
