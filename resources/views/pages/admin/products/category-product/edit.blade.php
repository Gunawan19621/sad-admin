@extends('layouts.master-dashboard')
@section('title', 'Edit Category Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.category-product.index') }}">Category Product</a>
    </li>
    <li class="breadcrumb-item active">Edit Category Product</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.category-product.update', $categoryProduct->id) }}" method="POST"
                enctype="multipart/form-data" id="inputanForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name_category_product">Name Category <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name_category_product" name="name_category_product"
                        value="{{ $categoryProduct->name_category_product }}" placeholder="Enter Name Category" required />
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_category_product">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_category_product" class="form-control" name="description_category_product"
                        placeholder="Enter description Resort" rows="3" required>{{ $categoryProduct->description_category_product }}</textarea>
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
