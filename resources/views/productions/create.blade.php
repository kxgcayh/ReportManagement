@extends('layouts.app', (['title' => 'Management Production']))
@section('content')
@breadcrumb(['header' => 'Create Production', 'active' => 'Create'])
@bcItem(['value' => 'Productions'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb
<div class="row">
    @cardbox(['header' => ''])
    @ifAlert
    <form role="form" action="{{ route('productions.store') }}" method="post" class="form-material">
        @csrf
        <div class="form-group">
            <input id="id_production" type="text" name="name" required
                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Nama Tempat Produksi">
            <p class="text-danger">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
            <select name="location_id" id="location_id" required
                class="form-control {{ $errors->has('location_id') ? 'is-invalid':'' }}">
                <option></option>
                @foreach ($locations as $locs)
                <option value="{{ $locs->id_location }}">{{ ucfirst($locs->name) }}</option>
                @endforeach
            </select>
            <small class="form-control-feedback"> Select Location </small>
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
                    <td>{{ $prods->locations['name'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data Produksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $productions->links() }}
    @endcardbox
</div>
@endsection
