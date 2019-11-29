@extends('layouts.app', (['title' => 'Management Brand']))

@section('content')

@breadcrumb(['header' => 'Create Brand', 'active' => 'Create'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb

<div class="row">
    @cardbox(['header' => ''])
    @ifAlert
    <form role="form" action="{{ route('brands.store') }}" method="post" class="form-material">
        @csrf
        <div class="form-group">
            <input id="id_brand" type="text" name="name" required class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Brand Name">
            <p class="text-danger">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
            <input id="id_detail" type="text" name="detail" required class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" placeholder="Description">
            <p class="text-danger">{{ $errors->first('detail') }}</p>
        </div>
        <div class="form-group pull-right">
            <button class="btn waves-effect waves-light btn-primary">
                <i class="fa fa-send"></i> Save
            </button>
            <a href="{{ route('brands.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
        </div>
    </form>
    @endcardbox
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
                @forelse ($brands as $value)
                <tr>
                    <td>{{ ++$no }}</td>
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
    {{ $brands->links() }}
    @endcardbox
</div>
@endsection

