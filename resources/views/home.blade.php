@extends('layouts.app', (['title' => 'Home']))
@section('content')

<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-2 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
    </div>
    {{-- Row --}}
    <div class="row">
        {{-- Column --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <a href="{{route('projects.index')}}">
                            <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                                <i class="mdi mdi-cellphone-link"></i>
                            </div>
                        </a>
                        <div class="ml-2 align-self-center">
                            <h3 class="mb-0 font-weight-light">Total Project: {{$projectCount}}</h3>
                            <h5 class="text-muted mb-0">Tempat dimana menyimpan Data Report</h5><br>
                        </div>
                    </div>
                    @modalBtn(['btnClass' => 'primary btn pull-right', 'dataTarget' => 'createProject', 'icon' => 'mdi
                    mdi-plus-circle-outline', 'name' => 'Create Project'])
                    @modal(['id' => 'createProject', 'size' => '', 'color' => 'primary', 'title' => 'Create Project'])
                    <form role="form" action="{{ route('projects.store') }}" method="POST" class="form-material">
                        @csrf
                        @can('Manage Projects')
                        <div class="form-group">
                            <input name="name" type="text"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                placeholder="Project Name">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="description" cols="5" rows="5"
                                class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"
                                placeholder="Description (optional)"></textarea>
                        </div>
                        @else
                        <div class="form-group">
                            <input name="name" type="text"
                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}"
                                placeholder="Project Name" disabled>
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="description" cols="5" rows="5"
                                class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"
                                placeholder="Description" disabled></textarea>
                        </div>
                        @endcan
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right"><i
                                class="mdi mdi-loupe"></i> Submit</button>
                    </form>
                    @endmodal
                </div>
            </div>
        </div>
        {{-- Column --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <a href="{{route('reports.index')}}">
                            <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                <i class="mdi mdi-bullseye"></i>
                            </div>
                        </a>
                        <div class="ml-2 align-self-center">
                            <h3 class="mb-0 font-weight-light">Total Report: {{$reportCount}}</h3>
                            <h5 class="text-muted mb-0">Tempat dimana Data Report tersimpan</h5>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('reports.create')}}" class="btn btn-primary">
                            <i class="mdi mdi-plus-circle-outline"></i> Create Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Column --}}
    </div>
    {{-- Row --}}
</div>
@endsection
