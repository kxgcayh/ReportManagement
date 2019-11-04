@extends('layouts.app')

@section('title')
<title>Management Production</title>
@endsection

@section('content')

@breadcumb(['header' => 'Create Prodcuctions'])
@breadc_item(['active' => 'Create'])
@breadc_active Management Production @endbreadc_active
@breadc_active Data Master @endbreadc_active
@endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox
        @slot('header')
            <a class="btn btn-success pull-right" href="{{ route('productions.index') }}"> Back</a>
        @endslot

        @include('inc.ifalert')

        <form role="form" action="{{ route('productions.store') }}" method="post" class="form-material">
            @csrf
            <div class="form-group">
                <label for="id_production">Nama Tempat Produksi</label>
                <input id="id_production" type="text" name="name" required class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="location_id">Lokasi</label>
                <select name="location_id" id="location_id" required class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
                    <option value=""></option>
                    @foreach ($locations as $locs)
                    <option value="{{ $locs->id_location }}">{{ ucfirst($locs->name) }}</option>
                    @endforeach
                </select>
                <p class="text-danger">{{ $errors->first('location_id') }}</p>
            </div>
            <div class="form-group col-md-6">
                <button class="btn waves-effect waves-light btn-primary">
                    <i class="fa fa-send"></i> Save
                </button>
                <a href="{{ route('productions.index') }}" class="btn waves-effect waves-light btn-primary">Back </a>
            </div>
        </form>
        @endcardbox
    </div>
    <div class="col-md-6">
        @cardbox(['header' => 'List Production'])
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produksi</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($productions as $prods)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $prods->name }}</td>
                        <td>{{ $prods->location['name'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data Produksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endcardbox
    </div>
</div>
@endsection
