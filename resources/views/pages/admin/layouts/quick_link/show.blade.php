@extends('layouts.master-dashboard')
@section('title', 'Show Quic Link')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.quick-link.index') }}">Quic Link</a>
    </li>
    <li class="breadcrumb-item active">Show Quic Link</li>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Quic Link</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" id="title" value="{{ $quicLink->title }}" readonly />
            </div>

            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea id="description" class="form-control" rows="3" readonly>{{ $quicLink->description }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.quick-link.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
