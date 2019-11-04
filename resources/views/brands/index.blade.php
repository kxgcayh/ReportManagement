@extends('layouts.app')

@section('title')
    <title>Management Brands</title>
@endsection

@section('content')

@breadcumb(['header' => 'Management Brand'])
    @breadc_item(['active' => 'Brand'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb
    @card
        @slot('header')
            <a href="{{ route('brands.create') }}" class="btn waves-effect waves-light btn-primary"><i class="fa fa-edit"></i> Create Brand </a>
        @endslot

        @include('inc.ifalert')
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Tempat Produksi</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
	                @forelse ($brands as $brand)
	                <tr>
	                    <td>{{ ++$i }}</td>
	                    <td>{{ $brand->name }}</td>
	                    <td>{{ $brand->detail }}</td>
                        <td>{{ $brand->production['name'] }}</td>
	                    <td>
                            <form action="{{ route('brands.destroy', [$brand->id_brand]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('brands.edit', [$brand->id_brand]) }}"
                                    class="btn btn-warning btn-sm">
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
                        <td colspan="5" class="text-center">Tidak ada data Brand</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endcard
{!! $brands->render() !!}
@endsection
