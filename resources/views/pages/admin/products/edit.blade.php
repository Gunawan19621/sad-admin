@extends('layouts.master-dashboard')
@section('title', 'Edit Product')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.product.index') }}">Product</a>
    </li>
    <li class="breadcrumb-item active">Edit Product</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.product.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class=" mb-1 text-center">
                            <label class="form-label">Image Product</label>
                        </div>
                        <div class="mb-3">
                            @if ($product->image_product)
                                <img src="{{ asset('images/' . $product->image_product) }}" alt="Image Story"
                                    class="img-fluid" style="max-width: 100%; max-height: 250px">
                            @else
                                <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="year_product">Year Product <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="year_product" name="year_product"
                                value="{{ $product->year_product }}" placeholder="Enter Year Product" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alcohol">Alcohol <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="alcohol" name="alcohol"
                                value="{{ $product->alcohol }}" placeholder="Enter Alcohol Content" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="temperature">Serving Temperature <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="temperature" name="temperature"
                                value="{{ $product->temperature }}" placeholder="Enter Serving Temperature" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="size_bottle">Size Bottle <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="size_bottle" name="size_bottle"
                                value="{{ $product->size_bottle }}" placeholder="Enter Size Bottle" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="total_acidity">Total Acidity <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="total_acidity" name="total_acidity"
                                value="{{ $product->total_acidity }}" placeholder="Enter Total Acidity" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ressidual_sugar">Residual Sugar <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="ressidual_sugar" name="ressidual_sugar"
                                value="{{ $product->ressidual_sugar }}" placeholder="Enter Residual Sugar" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bottle_produced">Bottle Produced <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="bottle_produced" name="bottle_produced"
                                value="{{ $product->bottle_produced }}" placeholder="Enter Bottle Produced" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="award_won">Award Won <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="award_won" name="award_won"
                                value="{{ $product->award_won }}" placeholder="Enter Award Won" required />
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="id_distributor">Name Distributor <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_distributor" name="id_distributor" required>
                                <option disabled selected>Select one</option>
                                @foreach ($distributor as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $product->id_distributor == $data->id ? 'selected' : '' }}>
                                        {{ $data->name_distributor }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="id_sub_category">Sub Category <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_sub_category" name="id_sub_category" required>
                                <option disabled selected>Select one</option>
                                @foreach ($subCategory as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $product->id_sub_category == $data->id ? 'selected' : '' }}>
                                        {{ $data->name_sub_category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="name_product">Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_product" name="name_product"
                                value="{{ $product->name_product }}" placeholder="Enter Name Product" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="sub_product">Subtitle Product <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="sub_product" name="sub_product"
                                value="{{ $product->sub_product }}" placeholder="Enter Subtitle Product" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="cellaring">Cellaring <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="cellaring" name="cellaring"
                                value="{{ $product->cellaring }}" placeholder="Enter Cellaring" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image_product" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image_product" name="image_product"
                                accept="image/*" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="characteristics">Characteristics <span
                                    class="text-danger">*</span></label>
                            <textarea id="characteristics" class="form-control" name="characteristics"
                                placeholder="Enter Characteristics Product" rows="3" required>{{ $product->characteristics }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="testing_note">Testing Note <span
                                    class="text-danger">*</span></label>
                            <textarea id="testing_note" class="form-control" name="testing_note" placeholder="Enter Testing Note"
                                rows="3" required>{{ $product->testing_note }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="food_pairing">Food Pairing <span
                                    class="text-danger">*</span></label>
                            <textarea id="food_pairing" class="form-control" name="food_pairing" placeholder="Enter Food Pairing"
                                rows="3" required>{{ $product->food_pairing }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="description_product">Description <span
                                    class="text-danger">*</span></label>
                            <textarea id="description_product" class="form-control" name="description_product"
                                placeholder="Enter Description Product" rows="3" required>{{ $product->description_product }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.product.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script CK Editor -->
    @include('pages.admin.products.script')
@endsection
