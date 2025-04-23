@extends('layouts.master-dashboard')
@section('title', 'Experience')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Experience</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')
    <p>Halaman</p>
@endsection
