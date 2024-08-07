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
                    <div class="col-md-4 text-center">
                        <label for="image" class="form-label mb-3">Image</label>
                        <div class="mb-3">
                            @if ($resort->image)
                                <img src="{{ asset('images/' . $resort->image) }}" alt="Image Story" class="img-fluid"
                                    style="max-width: 100%; max-height: 250px">
                            @else
                                <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="title_resort">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_resort" name="title_resort"
                                value="{{ $resort->title_resort }}" placeholder="Enter Title Resort" required />
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_resort">Subtitle <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="subtitle_resort" id="subtitle_resort" cols="30" rows="3"
                                placeholder="Enter Subtitle Resort" required>{{ $resort->subtitle_resort }}</textarea>
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
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
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
