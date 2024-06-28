@extends('layouts.master-dashboard')
@section('title', 'Show Category Product')
@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Category</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="name_category_product">Name Category</label>
                <input class="form-control" id="name_category_product" value="{{ $categoryProduct->name_category_product }}"
                    readonly />
            </div>
            <div class="mb-4">
                <label class="form-label" for="description_category_product">Description</label>
                <textarea id="description_category_product" class="form-control" readonly rows="3">{{ $categoryProduct->description_category_product }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.category-product.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_category_product', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
