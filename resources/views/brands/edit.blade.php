@extends('layouts.app')
@section('content')
@breadcumb(['header' => 'Edit Brand'])
    @breadc_item(['active' => 'Brand'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb
@card
    @slot('header')
        <a href="{{ route('brands.create') }}" class="btn waves-effect waves-light btn-primary"><i class="fa fa-edit"></i> Create Brand </a>
    @endslot
    @include('inc.ifalert')
    <form role="form" action="{{ route('brands.update', $brand->id_brand) }}" method="POST" class="form-material">
        @method('PUT')
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $brand->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $brand->detail }}</textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		        <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>
@endcard
@endsection
