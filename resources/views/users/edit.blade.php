@extends('layouts.app')

@section('content')

<div class="container-fluid">
    {{-- Bread crumb and right sidebar toggle --}}
    <div class="row page-titles">
        <div class="col-md-5 col-2 align-self-center">
            <h4 class="text-themecolor">Edit Users</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit</a></li>
                <li class="breadcrumb-item active">Users</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    {{-- End Bread crumb and right sidebar toggle --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                    </h4>
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

                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id], 'class' => 'form-material']) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="departement_id">Departement</label>
                                    <select name="departement_id" id="departement_id" required
                                    class="form-control {{ $errors->has('departement_id') ? 'is-invalid':'' }}">
                                        <option value=""></option>
                                        @foreach ($departements as $depts)
                                            <option value="{{ $depts->id_departement }}" {{ $depts->id_departement == $user->departement_id ? 'selected':'' }}>
                                                {{ ucfirst($depts->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('departement_id') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-40 row">
                                <div class="form-group col-md-6 m-t-20">
                                    <strong>Password:</strong>
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group col-md-6 m-t-20">
                                    <strong>Confirm Password:</strong>
                                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
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
