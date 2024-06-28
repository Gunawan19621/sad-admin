@extends('layouts.master-dashboard')
@section('title', 'Show Resort')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Resort</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="title_resort">Title</label>
                        <input class="form-control" id="title_resort" value="{{ $resort->title_resort }}" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_resort">Subtitle</label>
                        <input class="form-control" id="subtitle_resort" value="{{ $resort->subtitle_resort }}" readonly />
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label" for="description_resort">Description</label>
                <textarea id="description_resort" class="form-control" rows="3" readonly>{{ $resort->description_resort }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.resort.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_resort', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
