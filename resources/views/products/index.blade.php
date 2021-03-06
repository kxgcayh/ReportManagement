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
@role('User')
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@else
@modalBtn(['btnClass' => 'warning btn pull-right', 'dataTarget' => 'trash', 'icon' => 'mdi mdi-information-outline',
'name' => 'Product Bin'])
@endrole
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Production</th>
                <th>Details</th>
                <th>Latest By</th>
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
                <td>
                    @if($product->updatedBy['name'] == null)
                    <label class="badge badge-info">{{ $product->createdBy['name'] }}</label>
                    @else
                    <label class="badge badge-info">{{ $product->updatedBy['name'] }}</label>
                    @endif
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

@modal(['id' => 'trash', 'size' => 'lg', 'color' => 'warning', 'title' => 'Product Bin'])
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name Product</th>
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
                    <a href="/products/restore/{{ $prods->id_product }}" class="btn btn-success btn-sm">Restore</a>
                    <a href="/products/forceDelete/{{ $prods->id_product }}" class="btn btn-danger btn-sm">Force
                        Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Tidak ada data Produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endmodal

@endsection
