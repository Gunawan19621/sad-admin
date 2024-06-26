@extends('layouts.master-dashboard')
@section('title', 'Create Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product.index') }}">Product</a>
    </li>
    <li class="breadcrumb-item active">Create Product</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="id_distributor">Name Distributor <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_distributor" name="id_distributor" required>
                                <option disabled selected>Select one</option>
                                @foreach ($distributor as $data)
                                    <option value="{{ $data->id }}">{{ $data->name_distributor }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name_product">Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_product" name="name_product"
                                placeholder="Enter Name Product" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price_product">Price <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="price_product" name="price_product"
                                placeholder="Enter Price Product" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="id_category_product">Category Product <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_category_product" name="id_category_product" required>
                                <option disabled selected>Select one</option>
                                @foreach ($categoryProduct as $data)
                                    <option value="{{ $data->id }}">{{ $data->name_category_product }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stock_product">Stock <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="stock_product" name="stock_product"
                                placeholder="Enter Stock Product" required />
                        </div>
                        <div class="mb-3">
                            <label for="image_product" class="form-label">Image <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_product" name="image_product"
                                accept="image/*" required />
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label" for="description_product">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_product" class="form-control" name="description_product"
                        placeholder="Enter description Product" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.product.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_product', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
