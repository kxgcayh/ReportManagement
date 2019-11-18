@extends('layouts.app', (['title' => 'Management Category']))

@section('content')
@breadcrumb(['header' => 'Management Category', 'active' => 'Category'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb

<div class="row">
    @cardbox(['header' => 'Create Category'])
        <form role="form" action="{{ route('categories.store') }}" method="POST" class="form-material">
            @csrf
            <div class="form-group">
                @can('Manage Categories')
                    <input name="name" type="text" id="id_category" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Category Name">
                @else
                    <input name="name" type="text" id="id_category" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Category Name" disabled>
                @endcan
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Submit</button>
        </form>
    @endcardbox
    @cardbox(['header' => 'List Category'])
        @include('inc.ifalert')
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name Category</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cats)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $cats->name }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $cats->id_category) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('categories.edit', $cats->id_category) }}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data Category</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $categories->links() }}
    @endcardbox
</div>

@endsection
