@extends('layouts.app')

@section('title')
    <title>Management Production</title>
@endsection

@section('content')

@breadcumb(['header' => 'Management Production'])
    @breadc_item(['active' => 'Production'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb
    @card
        @slot('header')
            <a href="{{ route('productions.create') }}" class="btn waves-effect waves-light btn-primary"><i class="fa fa-edit"></i> Create </a>
        @endslot

        @include('inc.ifalert')

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
                                        class="btn btn-warning btn-sm">
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
                            <td colspan="5" class="text-center">Tidak ada data Produksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $productions->links() }}
    @endcard
@endsection
