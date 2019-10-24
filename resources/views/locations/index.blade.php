@extends('layouts.app')

@section('title')
    <title>Management Location</title>
@endsection

@section('content')
@breadcumb(['header' => 'Management Location'])
    @breadc_item(['active' => 'Location'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox(['header' => 'Create Location'])
            <form role="form" action="{{ route('locations.store') }}" method="POST" class="floating-labels">
                @csrf
                <div class="form-group">
                    <label for="id_location">Location</label>
                    <input name="name" type="text" id="id_location" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                <button href="#" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</button>
            </form>
        @endcardbox
    </div>
    <div class="col-md-6">
        @cardbox(['header' => 'List Location'])

            @include('inc.ifalert')

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lokasi</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($locations as $locs)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $locs->name }}</td>
                            <td>{{ $locs->description }}</td>
                            <td>
                                <form action="{{ route('locations.destroy', $locs->id_location) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('locations.edit', $locs->id_location) }}" class="btn btn-warning btn-sm">
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
                            <td colspan="4" class="text-center">Tidak ada data Lokasi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endcardbox
    </div>
</div>

@endsection
