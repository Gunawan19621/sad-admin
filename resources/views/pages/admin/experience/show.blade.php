@extends('layouts.master-dashboard')
@section('title', 'Show Experience')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.experience.index') }}">Experience</a>
    </li>
    <li class="breadcrumb-item active">Show Experience</li>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Experience</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <label for="image" class="form-label mb-3">Image</label>
                    <div class="mb-3">
                        @if ($experience->image)
                            <img src="{{ asset('images/' . $experience->image) }}" alt="Image Story" class="img-fluid"
                                style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="title_experience">Title</label>
                        <input class="form-control" id="title_experience" value="{{ $experience->title_experience }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_experience">Subtitle</label>
                        <textarea id="subtitle_experience" class="form-control" rows="3" readonly>{{ $experience->subtitle_experience }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="description_experience">Description</label>
                <textarea id="description_experience" class="form-control" rows="3" readonly>{{ $experience->description_experience }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.experience.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_experience', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
