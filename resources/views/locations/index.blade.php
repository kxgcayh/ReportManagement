@extends('layouts.app', (['title' => 'Management Locations']))
@section('content')
@breadcrumb(['header' => 'Management Locations', 'active' => 'Locations'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert
@cwidget(['widget' => 'create', 'title' => 'Create Locations'])
    <form role="form" action="{{ route('locations.store') }}" method="POST" class="form-material">
        @csrf
        <div class="form-group">
            <input name="name" type="text" id="id_location" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Location Name">
        </div>
        <div class="form-group">
            <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}" placeholder="Location Detail"></textarea>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
    </form>
@endcwidget
@card(['header' => 'List Location'])
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
                @forelse ($locations as $locs)
                <tr>
                    <td>{{ ++$no }}</td>
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
    {{ $locations->links() }}
@endcard

@endsection
