@extends('layouts.master-dashboard')
@section('title', 'Edit Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.suade-product.index') }}">Suade Product</a>
    </li>
    <li class="breadcrumb-item active">Edit Product</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.suade-product.update', $suadeProduct->id) }}" method="POST"
                enctype="multipart/form-data" id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class=" mb-1 text-center">
                            <label class="form-label">Image Product</label>
                        </div>
                        <div class="mb-3">
                            @if ($suadeProduct->image_product)
                                <img src="{{ asset('images/product/' . $suadeProduct->image_product) }}" alt="Image Product"
                                    class="img-fluid" style="max-width: 100%; max-height: 250px">
                            @else
                                <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label" for="name_product">Name Product <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_product" name="name_product"
                                value="{{ $suadeProduct->name_product }}" placeholder="Enter Name Product" required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="image_product">Images Product</label>
                            <input class="form-control" type="file" id="image_product" name="image_product"
                                accept="image/png, image/jpeg" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="status_product">Status <span class="text-danger">*</span></label>
                            <select name="status_product" id="status_product" class="form-select" required>
                                <option disabled selected>Select Status</option>
                                <option value="1" {{ $suadeProduct->status_product == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ $suadeProduct->status_product == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="category_id">Category <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option disabled selected>Select Status</option>
                                @foreach ($productCategory as $list)
                                    <option value="{{ $list->id }}"
                                        {{ $suadeProduct->category_id == $list->id ? 'selected' : '' }}>
                                        {{ $list->name_category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="type_id">Type <span class="text-danger">*</span></label>
                            <select name="type_id" id="type_id" class="form-select" required>
                                <option disabled selected>Select Status</option>
                                @foreach ($productType as $list)
                                    <option value="{{ $list->id }}"
                                        {{ $suadeProduct->type_id == $list->id ? 'selected' : '' }}>
                                        {{ $list->name_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="price_product">Price Product <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">RP.</span>
                                <input class="form-control" type="number" id="price_product" name="price_product"
                                    value="{{ $suadeProduct->price_product }}" placeholder="Enter Price Product"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="discount_product">Discount Product <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" type="number" id="discount_product"
                                    value="{{ $suadeProduct->discount_product }}" name="discount_product"
                                    placeholder="Enter Price Product" required />
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="subtitle_product">Subtitle Product <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="subtitle_product" id="subtitle_product" cols="30" rows="3"
                        placeholder="Enter Subtitle Product">{{ $suadeProduct->subtitle_product }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description_product">Description Product <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="description_product" id="description_product" cols="30" rows="3">{{ $suadeProduct->description_product }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="additional_product">Additional Product <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="additional_product" id="additional_product" cols="30">{{ $suadeProduct->additional_product }}</textarea>
                </div>

                <div class="text-center">
                    <a href="{{ route('dashboard.suade-product.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_product', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('additional_product', {
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
