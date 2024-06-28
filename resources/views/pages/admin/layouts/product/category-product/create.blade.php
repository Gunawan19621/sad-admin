@extends('layouts.master-dashboard')
@section('title', 'Create Product')
@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.category-product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name_category_product">Name Category <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name_category_product" name="name_category_product"
                        placeholder="Enter Name Category" required />
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_category_product">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_category_product" class="form-control" name="description_category_product"
                        placeholder="Enter description Resort" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.category-product.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_category_product', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
