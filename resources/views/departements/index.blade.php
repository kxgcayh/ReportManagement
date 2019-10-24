@extends('layouts.app')

@section('title')
    <title>Management Departement</title>
@endsection

@section('content')

@breadcumb(['header' => 'Management Departement'])
    @breadc_item(['active' => 'Departement'])
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb
    @card
        @slot('header')
            <a href="{{ route('departements.create') }}" class="btn waves-effect waves-light btn-primary"><i class="fa fa-edit"></i> Create </a>
        @endslot

        @include('inc.ifalert')

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Departement</th>
                        <th>Lokasi</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @forelse ($departements as $depts)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $depts->name }}</td>
                            <td>{{ $depts->location['name'] }}</td>
                            <td>{{ $depts->location['description'] }}</td>
                            <td>
                                <form action="{{ route('departements.destroy', $depts->id_departement) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <a href="{{ route('departements.edit', $depts->id_departement) }}"
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
                            <td colspan="4" class="text-center">Tidak ada data Departemen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endcard
@endsection
