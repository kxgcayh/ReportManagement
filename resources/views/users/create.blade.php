@extends('layouts.app', (['title' => 'Management User']))

@section('content')

<div class="container-fluid">
    {{-- Bread crumb and right sidebar toggle --}}
    @breadcrumb(['header' => 'Create User', 'active' => 'Create'])
        @bcItem(['value' => 'User'])
        @bcItem(['value' => 'Data Master'])
    @endbreadcrumb
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

                        {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'form-material')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    {!! Form::text('name', null, array('class' => 'form-control', 'id' => 'name', 'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    {!! Form::text('email', null, array('class' => 'form-control', 'id' => 'email', 'required')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="departement">Departement</label>
                                    <select name="departement_id" id="departement_id" required class="form-control {{ $errors->has('departement_id') ? 'is-invalid':'' }}">
                                        <option value=""></option>
                                        @foreach ($departements as $depts)
                                        <option value="{{ $depts->id_departement }}">
                                            {{ ucfirst($depts->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('depatement_id') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-40 row">
                                <div class="form-group col-md-6 m-t-20">
                                    <label for="password">Password</label>
                                    {!! Form::password('password', array('class' => 'form-control', 'id' => 'email', 'required')) !!}
                                </div>
                                <div class="form-group col-md-6 m-t-20">
                                    <label>Confirm Password:</label>
                                    {!! Form::password('confirm-password', array('Confirm Password','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Role:</label>
                                    {{-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} --}}
                                    <select class="form-control {{ $errors->has('id') ? 'is-invalid':'' }}" multiple name="roles[]" required>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{ ucfirst($role->name) }}
                                        </option>
                                        @endforeach
                                    </select>
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
