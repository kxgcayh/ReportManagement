@extends('layouts.app', (['title' => 'Management Product']))

@section('content')

@breadcrumb(['header' => 'Edit Product', 'active' => 'Edit'])
@bcItem(['value' => 'Products'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card(['header' => ''])
<form role="form" action="{{ route('products.update', $products->id_product) }}" method="POST" class="form-material">
    @method('PUT')
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-md-11,5">
        <label for="id_product">Product Name</label>
        <input id="id_product" type="text" name="name" required value="{{ $products->name }}"
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group col-md-11,5">
        <label for="production_id">Production</label>
        <select name="production_id" id="production_id" required
            class="form-control {{ $errors->has('production_id') ? 'is-invalid':'' }}">
            <option value=""></option>
            @foreach ($productions as $prods)
            <option value="{{ $prods->id_production }}"
                {{ $prods->id_production == $products->production_id ? 'selected':'' }}>
                {{ ucfirst($prods->name) }}
            </option>
            @endforeach
        </select>
        <p class="text-danger">{{ $errors->first('production_id') }}</p>
    </div>
    <div class="form-group col-md-11,5">
        <label>Description</label>
        <textarea class="form-control" style="height:150px" name="detail"
            placeholder="Detail">{{ $products->detail }}</textarea>
        <span class="bar"></span>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
        <a href="{{ route('products.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
    </div>
    @endcard
    @endsection
