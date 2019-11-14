@extends('layouts.app', (['title' => 'Management User']))

@section('content')
<div class="container-fluid">
    {{-- Bread crumb and right sidebar toggle --}}
    @breadcrumb(['header' => 'Edit User', 'active' => 'Edit'])
        @bcItem(['value' => 'User'])
        @bcItem(['value' => 'Data Master'])
    @endbreadcrumb
    {{-- End Bread crumb and right sidebar toggle --}}
    @card(['header' => ''])
        @ifAlert
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
                <a class="btn btn-info" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
        {!! Form::close() !!}
    @endcard
</div>
@endsection
