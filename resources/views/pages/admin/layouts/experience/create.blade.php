@extends('layouts.master-dashboard')
@section('title', 'Create Experience')
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Experience</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.experience.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_experience">Title <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_experience" name="title_experience"
                                placeholder="Enter Title Experience" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_experience">Subtitle <span
                                    class="text-danger">*</span></label>
                            <textarea id="subtitle_experience" class="form-control" name="subtitle_experience"
                                placeholder="Enter Subtitle Experience" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_experience">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_experience" class="form-control" name="description_experience"
                        placeholder="Enter description story" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.experience.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_experience', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
