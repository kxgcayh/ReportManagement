@extends('layouts.app', (['title' => 'Management Brand']))

@section('content')

@breadcrumb(['header' => 'Management Brands', 'active' => 'Brands'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card
@slot('header')
<a href="{{ route('brands.create') }}" class="btn waves-effect waves-light btn-primary pull-left"><i
        class="fa fa-edit"></i>
    Create Brand </a>
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
@ifAlert
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th>Created and Updated By</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($brands as $brand)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->detail }}</td>
                <td><label class="badge badge-success">{{ $brand->createdBy['name'] }}</label>/<label
                        class="badge badge-warning">{{ $brand->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('brands.destroy', [$brand->id_brand]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('brands.edit', [$brand->id_brand]) }}"
                            class="btn btn-warning waves-effect waves-light">
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
                <td colspan="5" class="text-center">Tidak ada data Brand</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_brands as $brand)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->detail }}</td>
                <td><label class="badge badge-success">{{ $brand->createdBy['name'] }}</label>/<label
                        class="badge badge-warning">{{ $brand->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('brands.destroy', [$brand->id_brand]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('brands.edit', [$brand->id_brand]) }}" class="btn btn-warning">
                            <i class="fa fa-edit"> Edit</i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"> Delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data Brand</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>
@endcard
@role('Admin|Manager')
{{ $brands->links() }}
@else
{{ $user_brands->links() }}
@endrole

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Created By</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inactive as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->detail }}</td>
            <td>{{ $brand->createdBy['name'] }}</td>
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
