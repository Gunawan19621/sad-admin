@extends('layouts.master-dashboard')
@section('title', 'Edit Resort')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.resort.index') }}">Resort</a>
    </li>
    <li class="breadcrumb-item active">Edit Resort</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Resort</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.resort.update', $resort->id) }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_resort">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_resort" name="title_resort"
                                value="{{ $resort->title_resort }}" placeholder="Enter Title Resort" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_resort">Subtitle <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="subtitle_resort" name="subtitle_resort"
                                value="{{ $resort->subtitle_resort }}" placeholder="Enter Subtitle Resort" required />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_resort">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_resort" class="form-control" name="description_resort" placeholder="Enter description Resort"
                        rows="3" required>{{ $resort->description_resort }}</textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.resort.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_resort', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
