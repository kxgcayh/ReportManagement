@extends('layouts.app', (['title' => 'Management Departement']))

@section('content')

@breadcrumb(['header' => 'Departement List', 'active' => 'View'])
@bcItem(['value' => 'Departements'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

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
            @forelse ($departements as $depts)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $depts->name }}</td>
                <td>{{ $depts->location['name'] }}</td>
                <td>{{ $depts->location['description'] }}</td>
                <td>
                    <form action="{{ route('departements.destroy', $depts->id_departement) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('departements.edit', $depts->id_departement) }}" class="btn btn-warning">
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
                <td colspan="4" class="text-center">Tidak ada data Departemen</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $departements->links() }}
</div>
@endcard
@endsection
