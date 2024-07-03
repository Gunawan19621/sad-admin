@extends('layouts.master-dashboard')
@section('title', 'Show Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product.index') }}">Product</a>
    </li>
    <li class="breadcrumb-item active">Show Product</li>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show Product</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        <label class="form-label">Image Product</label>
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('images/' . $product->image_product) }}" alt="image_product" class="img-fluid"
                            style="max-width: 100%; max-height: 250px">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="name_product">Name</label>
                        <input class="form-control" id="name_product" value="{{ $product->name_product }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="id_distributor">Name Distributor</label>
                        <select class="form-select" id="id_distributor" disabled>
                            <option disabled selected>Select one</option>
                            @foreach ($distributor as $data)
                                <option value="{{ $data->id }}"
                                    {{ $product->id_distributor == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_distributor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="id_sub_category">Sub Category <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_sub_category" disabled>
                            <option disabled selected>Select one</option>
                            @foreach ($subCategory as $data)
                                <option value="{{ $data->id }}"
                                    {{ $product->id_sub_category == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_sub_category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="stock_product">Stock</label>
                        <input class="form-control" id="stock_product" value="{{ $product->stock_product }}" readonly />
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="price_product">Price</label>
                <input class="form-control" id="price_product" value="{{ $product->price_product }}" readonly />
            </div>
            <div class="mb-4">
                <label class="form-label" for="description_product">Description</label>
                <textarea id="description_product" class="form-control" readonly>{{ $product->description_product }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.product.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_product', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
