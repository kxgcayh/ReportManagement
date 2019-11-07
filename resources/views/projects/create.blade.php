@extends('layouts.app')

@section('content')

<div class="container-fluid">
    {{-- Bread crumb and right sidebar toggle --}}
    <div class="row page-titles">
        <div class="col-md-5 col-2 align-self-center">
            <h4 class="text-themecolor">Create Project</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Create</a></li>
                <li class="breadcrumb-item active">Project</li>
            </ol>
        </div>
    </div>
    {{-- End Bread crumb and right sidebar toggle --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="card-text">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {!! Form::open(array('route' => 'projects.store','method'=>'POST', 'class' => 'form-material')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    {!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="project">Description</label>
                                    {!! Form::text('name', null, array('class' => 'form-control', 'id' => 'project', 'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
