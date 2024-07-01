@extends('layouts.master-dashboard')
@section('title', 'Create Story')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-story.index') }}">Our Story</a>
    </li>
    <li class="breadcrumb-item active">Create Story</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Story</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.our-story.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_story">Title Story <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_story" name="title_story"
                                placeholder="Enter Title Story" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="year_story">Year Story <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="year_story" name="year_story"
                                placeholder="Enter Title Story" required />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image_story" class="form-label">Image <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="image_story" name="image_story" accept="image/*"
                        required />
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_story">Description Story <span
                            class="text-danger">*</span></label>
                    <textarea id="description_story" class="form-control" name="description_story" placeholder="Enter description story"
                        rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.our-story.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_story', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
