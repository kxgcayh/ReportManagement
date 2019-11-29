@extends('layouts.app', (['title' => 'Management Role']))
@section('content')
{{-- Bread crumb and right sidebar toggle --}}
@breadcrumb(['header' => 'Edit Role', 'active' => 'Edit'])
    @bcItem(['value' => 'Roles'])
    @bcItem(['value' => 'Data Master'])
@endbreadcrumb
{{-- End Bread crumb and right sidebar toggle --}}
    @card(['header' => ''])
        @ifAlert
        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-material">
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong></br>
                    @foreach($permission as $value)
                        <input type="checkbox" class="name" value="{{ $value->id }}" name="permission[]" id="square-checkbox-{{ $value->id }}" data-checkbox="icheckbox_square-green">
                        <label for="square-checkbox-{{ $value->id }}">
                            {{ $value->name }}
                        </label>
                        <br/>
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    @endcard
</div>
@endsection
