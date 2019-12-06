@extends('layouts.app', (['title' => 'Management Project']))

@section('content')

@breadcrumb(['header' => 'Create Report', 'active' => 'Create'])
@bcItem(['value' => 'Report'])
@bcItem(['value' => 'Project'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@endsection
