@extends('layouts.master-dashboard')
@section('title', 'Edit Activiti')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.activiti.index') }}">Activiti</a>
    </li>
    <li class="breadcrumb-item active">Edit Activiti</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Activiti</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.activiti.update', $activiti->id) }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="mb-3">
                            @if ($activiti->image_activiti)
                                <img src="{{ asset('images/' . $activiti->image_activiti) }}" alt="Image Story"
                                    class="img-fluid" style="max-width: 100%; max-height: 250px">
                            @else
                                <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="title_activiti">Title <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="title_activiti" name="title_activiti"
                                value="{{ $activiti->title_activiti }}" placeholder="Enter Title Activiti" required />
                        </div>
                        <div class="mb-3">
                            <label for="image_activiti" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image_activiti" name="image_activiti"
                                accept="image/*" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_activiti">Subtitle <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="subtitle_activiti" id="subtitle_activiti" cols="30" rows="4"
                                placeholder="Enter Subtitle Activiti" required>{{ $activiti->subtitle_activiti }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description_activiti">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_activiti" class="form-control" name="description_activiti"
                        placeholder="Enter description Resort" rows="3" required>{{ $activiti->description_activiti }}</textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.activiti.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_activiti', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
