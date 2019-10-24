
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    {{-- Bread crumb and right sidebar toggle --}}
    <div class="row page-titles">
        <div class="col-md-5 col-2 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol> --}}
        </div>
    </div>
    {{-- End Bread crumb and right sidebar toggle --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="card-text">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <p>You are logged in!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
