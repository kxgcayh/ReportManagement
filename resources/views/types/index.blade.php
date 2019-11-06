@extends('layouts.app')

@section('title')
    <title>Management Type</title>
@endsection

@section('content')
@breadcumb(['header' => 'Create Type'])
    @breadc_item(['active' => 'Type'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox(['header' => ''])
            <form role="form" action="{{ route('types.store') }}" method="POST" class="floating-labels">
                @csrf
                <div class="form-group">
                    <label for="id_type">Type</label>
                    <input name="name" type="text" id="id_type" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
            </form>
        @endcardbox
    </div>
    <div class="col-md-6">
        @cardbox(['header' => 'List Type'])

            @include('inc.ifalert')

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name Type</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @forelse ($types as $type)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <form action="{{ route('types.destroy', $type->id_type) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('types.edit', $type->id_type) }}" class="btn btn-warning btn-sm">
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
                            <td colspan="4" class="text-center">Tidak ada data Type</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @endcardbox
    </div>
</div>

@endsection
