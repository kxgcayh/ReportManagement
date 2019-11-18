@extends('layouts.app', (['title' => 'Management Type']))
@section('content')
@breadcrumb(['header' => 'Management Type', 'active' => 'View'])
    @bcItem(['value' => 'Types'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
@ifAlert
<div class="row">
    @cardbox(['header' => 'Create Type'])
        <form role="form" action="{{ route('types.store') }}" method="POST" class="form-material">
            @csrf
            <div class="form-group">
                @can('Manage Types')
                    <input name="name" type="text" id="id_type" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Type Name">
                @else
                    <input name="name" type="text" id="id_type" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Type Name" disabled>
                @endcan
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
        </form>
    @endcardbox
    @cardbox(['header' => 'List Type'])
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
                    @forelse ($types as $type)
                    <tr>
                        <td>{{ ++$no }}</td>
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
        {{ $types->links() }}
    @endcardbox
</div>

@endsection
