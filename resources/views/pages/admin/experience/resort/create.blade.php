@extends('layouts.master-dashboard')
@section('title', 'Create Resort')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.resort.index') }}">Resort</a>
    </li>
    <li class="breadcrumb-item active">Create Resort</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Resort</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.resort.store') }}" method="POST" enctype="multipart/form-data" id="inputanForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="title_resort">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_resort" name="title_resort"
                                placeholder="Enter Title Resort" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_resort">Subtitle <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="subtitle_resort" id="subtitle_resort" cols="30" rows="3"
                                placeholder="Enter Subtitle Resort" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_resort">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_resort" class="form-control" name="description_resort" placeholder="Enter description Resort"
                        rows="3" required></textarea>
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
