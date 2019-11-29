@extends('layouts.app', (['title' => 'Management Production']))
@section('content')
@breadcrumb(['header' => 'Production List', 'active' => 'View'])
    @bcItem(['value' => 'Productions'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
@card
    @slot('header')
        <a href="{{ route('productions.create') }}" class="btn waves-effect waves-light btn-primary"><i class="fa fa-edit"></i> Create </a>
    @endslot
    @ifAlert
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produksi</th>
                    <th>Lokasi</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productions as $prods)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $prods->name }}</td>
                        <td>{{ $prods->location['name'] }}</td>
                        <td>{{ $prods->location['description'] }}</td>
                        <td>
                            <form action="{{route('productions.destroy',[$prods->id_production])}}" method="POST">
                                @method('DELETE') @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('productions.edit', [$prods->id_production]) }}"
                                    class="btn btn-warning">
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
                        <td colspan="5" class="text-center">Tidak ada data Produksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $productions->links() }}
@endcard
@endsection
