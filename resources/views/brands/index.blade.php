@extends('layouts.app', (['title' => 'Management Brand']))

@section('content')

@breadcrumb(['header' => 'Management Brands', 'active' => 'Brands'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Brand'])
@role('user')
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@else
@modalBtn(['btnClass' => 'warning btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Brand Bin'])
@endrole

@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Product</th>
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
                <td>{{ $brand->products['name'] }}</td>
                <td>{{ $brand->detail }}</td>
                <td><label class="badge badge-success">{{ $brand->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
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

@role('Admin|Manager')
{{ $brands->links() }}
@else
{{ $user_brands->links() }}
@endrole

@endcard

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
        @forelse ($inactive as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->detail }}</td>
            <td>{{ $brand->createdBy['name'] }}</td>
            <td>{{ $brand->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Semua data sudah di approve</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endmodal

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Data Brand'])
<form role="form" action="{{ route('brands.store') }}" method="post" class="form-material">
    @csrf
    <div class="form-group">
        <input id="id_brand" type="text" name="name" required
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Brand Name">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <input id="id_detail" type="text" name="detail" required
            class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" placeholder="Description">
        <p class="text-danger">{{ $errors->first('detail') }}</p>
    </div>
    <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" required
            class="form-control {{ $errors->has('product_id') ? 'is-invalid':'' }}">
            <option value=""></option>
            @foreach ($products as $prods)
            <option value="{{ $prods->id_product }}">{{ ucfirst($prods->name) }}</option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('location_id') }}</p>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
    </div>
</form>
@endmodal

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Brand Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Brand</th>
                <th>Deleted At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashed as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->deleted_at }}</td>
                <td>
                    <a href="/brands/restore/{{ $brand->id_brand }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/brands/forceDelete/{{ $brand->id_brand }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Brand</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
