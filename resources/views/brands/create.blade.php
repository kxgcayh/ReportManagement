@extends('layouts.app')

@section('title')
<title>Management Brand</title>
@endsection

@section('content')

@breadcumb(['header' => 'Create Brand'])
    @breadc_item(['active' => 'Create'])
        @breadc_active Management Brand @endbreadc_active
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox
        @slot('header')
            <a class="btn btn-primary" href="{{ route('brands.index') }}"> Back</a>
        @endslot

        @include('inc.ifalert')

        <form role="form" action="{{ route('brands.store') }}" method="post" class="form-material">
            @csrf
            <div class="form-group">
                <label for="id_brand">Nama Brand</label>
                <input id="id_brand" type="text" name="name" required class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="id_detail">Description</label>
                <input id="id_detail" type="text" name="detail" required class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('detail') }}</p>
            </div>            
            <div class="form-group col-md-6">
                <button class="btn waves-effect waves-light btn-primary">
                    <i class="fa fa-send"></i> Save
                </button>
                <a href="{{ route('brands.index') }}" class="btn waves-effect waves-light btn-primary">Back </a>
            </div>
        </form>
        @endcardbox
    </div>
    <div class="col-md-6">
        @cardbox(['header' => 'Brand List'])
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Brand</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($brands as $value)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $value->name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada data Lokasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endcardbox
    </div>
</div>
@endsection

