@extends('layouts.master-dashboard')
@section('title', 'Edit Quic Link')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.quick-link.index') }}">Quic Link</a>
    </li>
    <li class="breadcrumb-item active">Edit Quic Link</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Quic Link</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.quick-link.update', $quicLink->id) }}" method="POST"
                enctype="multipart/form-data" id="inputanForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="title">Title</label>
                    <input class="form-control" id="title" value="{{ $quicLink->title }}" readonly />
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                    <textarea id="description" class="form-control" name="description" placeholder="Enter description Quick Link"
                        rows="3" required>{{ $quicLink->description }}</textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.quick-link.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
