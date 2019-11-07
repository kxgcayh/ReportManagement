@extends('layouts.app')

@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcumb(['header' => 'User List'])
    @breadc_item(['active' => 'Projects'])
        @breadc_active Projects @endbreadc_active
    @endbreadc_item
@endbreadcumb
{{-- End Bread crumb and right sidebar toggle --}}
@component('components.card')
    @slot('header')
        <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
    @endslot

    @include('inc.ifalert')

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name Projects</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $key => $projs)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $projs->name }}</td>
                    <td>{{ $projs->description }}</td>
                    <td>
                        <a class="btn btn-info " href="{{ route('projects.show',$projs->id_project) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('projects.edit',$projs->id_project) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $projs->id_project],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {!! $projects->render() !!}
@endcomponent
@endsection
