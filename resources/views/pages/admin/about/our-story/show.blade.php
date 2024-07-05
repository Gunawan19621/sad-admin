@extends('layouts.master-dashboard')
@section('title', 'Show Our Story')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-story.index') }}">Our Story</a>
    </li>
    <li class="breadcrumb-item active">Show Story</li>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Story</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="">
                        <label for="image_story" class="form-label">Image Story</label>
                    </div>
                    <div class="mb-3">
                        @if ($ourStory->image_story)
                            <img src="{{ asset('images/' . $ourStory->image_story) }}" alt="Image Story" class="img-fluid"
                                style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="title_story">Title Story</label>
                        <input class="form-control" id="title_story" value="{{ $ourStory->title_story }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="year_story">Year Story</label>
                        <input class="form-control" id="year_story" value="{{ $ourStory->year_story }}" readonly />
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label" for="description_story">Description Story</label>
                <textarea id="description_story" class="form-control" rows="3" readonly>{{ $ourStory->description_story }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.our-story.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_story', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
