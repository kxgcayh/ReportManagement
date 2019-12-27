@extends('layouts.app', (['title' => 'Management Product']))

@section('content')

@breadcrumb(['header' => 'Management Products', 'active' => 'Products'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Product'])
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Production</th>
                <th>Details</th>
                <th>Created and Updated By</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->productions['name'] }}</td>
                <td>{{ $product->detail }}</td>
                <td><label class="badge badge-success">{{ $product->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $product->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('products.destroy', [$product->id_product]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('products.edit', [$product->id_product]) }}"
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
                <td colspan="5" class="text-center">Tidak ada data Product</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_products as $product)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td><label class="badge badge-success">{{ $product->createdBy['name'] }}</label>/<label
                        class="badge badge-warning">{{ $product->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('products.destroy', [$product->id_product]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('products.edit', [$product->id_product]) }}" class="btn btn-warning">
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
                <td colspan="5" class="text-center">Tidak ada data Product</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>

@role('Admin|Manager')
{{ $products->links() }}
@else
{{ $user_products->links() }}
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
        @forelse ($inactive as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->createdBy['name'] }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Semua data sudah di approve</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endmodal

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Data Product'])
<form role="form" action="{{ route('products.store') }}" method="post" class="form-material">
    @csrf
    <div class="form-group">
        <input id="id_product" type="text" name="name" required
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Product Name">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <input id="id_detail" type="text" name="detail" required
            class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" placeholder="Description">
        <p class="text-danger">{{ $errors->first('detail') }}</p>
    </div>
    <div class="form-group">
        <label for="production_id">Production</label>
        <select name="production_id" id="production_id" required
            class="form-control {{ $errors->has('production_id') ? 'is-invalid':'' }}">
            <option value=""></option>
            @foreach ($productions as $prods)
            <option value="{{ $prods->id_production }}">{{ ucfirst($prods->name) }}</option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('production_id') }}</p>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
    </div>
</form>
@endmodal
@endsection
