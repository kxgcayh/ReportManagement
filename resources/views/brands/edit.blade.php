@extends('layouts.app', (['title' => 'Management Brand']))

@section('content')

@breadcrumb(['header' => 'Edit Brand', 'active' => 'Brand'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card
@slot('header')
@endslot
@include('inc.ifalert')
<form role="form" action="{{ route('brands.update', $brands->id_brand) }}" method="POST" class="form-material">
    @method('PUT')
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset disabled>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Created By</label>
                <input name="created_by" value="{{ $brands->createdBy['name'] }}" type="text"
                    class="form-control form-control-line" id="created_by">
                <small>{{ $brands->created_at }}</small>
            </div>
            <div class="form-group col-md-6">
                <label>Updated By</label>
                <input name="updated_by" value="{{ $brands->updatedBy['name'] }}" type="text" class="form-control"
                    id="updated_by">
                <small>{{ $brands->updated_at }}</small>
            </div>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="name" value="{{ $brands->name }}" class="form-control" placeholder="Name">
                <span class="bar"></span>
            </div>
            <div class="form-group">
                <label for="product_id">Product</label>
                <select name="product_id" id="product_id" required
                    class="form-control {{ $errors->has('product_id') ? 'is-invalid':'' }}">
                    <option value=""></option>
                    @foreach ($products as $prods)
                    <option value="{{ $prods->id_product }}" {{ $prods->id_product == $brands->product_id }}>
                        {{ ucfirst($prods->name) }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('product_id') }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" style="height:150px" name="detail"
                    placeholder="Detail">{{ $brands->detail }}</textarea>
                <span class="bar"></span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('brands.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</a>
        </div>
    </div>
</form>
@endcard
@endsection
