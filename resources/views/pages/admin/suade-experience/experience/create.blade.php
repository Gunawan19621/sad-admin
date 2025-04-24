@extends('layouts.master-dashboard')
@section('title', 'Create User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.suade-experience.index') }}">Suade Experience</a>
    </li>
    <li class="breadcrumb-item active">Add Experience</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create User</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.suade-experience.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name_experience">Name Experience <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_experience" name="name_experience"
                                placeholder="Enter Name Experience" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="image_experience">Images Experience</label>
                            <input class="form-control" type="file" id="image_experience" name="image_experience"
                                accept="image/png, image/jpeg" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="category_id">Category <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option disabled selected>Select Status</option>
                                @foreach ($experienceCategory as $list)
                                    <option value="{{ $list->id }}">{{ $list->name_experience_category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="status_experience">Status <span
                                    class="text-danger">*</span></label>
                            <select name="status_experience" id="status_experience" class="form-select" required>
                                <option disabled selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="price_experience">Price Experience <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">RP.</span>
                                <input class="form-control" type="number" id="price_experience" name="price_experience"
                                    placeholder="Enter Price Experience" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="discount_experience">Discount Experience <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="number" id="discount_experience"
                                    name="discount_experience" placeholder="Enter Price Experience" required />
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="subtitle_experience">Subtitle Experience <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="subtitle_experience" id="subtitle_experience" cols="30" rows="3"
                        placeholder="Enter Subtitle Experience"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description_experience">Description Experience <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="description_experience" id="description_experience" cols="30" rows="3"
                        placeholder="Enter Description Experience"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="additional_experience">Additional Experience <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="additional_experience" id="additional_experience" cols="30" rows="3"
                        placeholder="Enter Additional Experience"></textarea>
                </div>

                <div class="text-center">
                    <a href="{{ route('dashboard.suade-experience.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_experience', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('additional_experience', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
