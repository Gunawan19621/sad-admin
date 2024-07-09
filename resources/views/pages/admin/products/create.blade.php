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

    <div class="card mb-2">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Product</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="id_sub_category">Sub Category <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_sub_category" name="id_sub_category" required>
                                <option disabled selected>Select one</option>
                                @foreach ($subCategory as $data)
                                    <option value="{{ $data->id }}">{{ $data->name_sub_category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="name_product">Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_product" name="name_product"
                                placeholder="Enter Name Product" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="year_product">Year Product <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="year_product" name="year_product"
                                placeholder="Enter Year Product" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="alcohol">Alcohol <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="alcohol" name="alcohol"
                                placeholder="Enter Alcohol Content" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="temperature">Serving Temperature <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="temperature" name="temperature"
                                placeholder="Enter Serving Temperature" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="cellaring">Cellaring <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="cellaring" name="cellaring"
                                placeholder="Enter Cellaring" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="total_acidity">Total Acidity <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="total_acidity" name="total_acidity"
                                placeholder="Enter Total Acidity" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="ressidual_sugar">Residual Sugar <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="ressidual_sugar" name="ressidual_sugar"
                                placeholder="Enter Residual Sugar" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="bottle_produced">Bottle Produced <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="bottle_produced" name="bottle_produced"
                                placeholder="Enter Bottle Produced" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="size_bottle">Size Bottle <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="size_bottle" name="size_bottle"
                                placeholder="Enter Size Bottle" required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="form-label" for="award_won">Award Won <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" id="award_won" name="award_won"
                                placeholder="Enter Award Won" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="image_product" class="form-label">Image <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_product" name="image_product"
                                accept="image/*" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-2">
                            <label class="form-label" for="sub_product">Subtitle Product <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="sub_product" id="sub_product" cols="30" rows="3"
                                placeholder="Enter Subtitle Product" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="characteristics">Characteristics <span
                                    class="text-danger">*</span></label>
                            <textarea id="characteristics" class="form-control" name="characteristics"
                                placeholder="Enter Characteristics Product" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="testing_note">Testing Note <span
                                    class="text-danger">*</span></label>
                            <textarea id="testing_note" class="form-control" name="testing_note" placeholder="Enter Testing Note"
                                rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="food_pairing">Food Pairing <span
                                    class="text-danger">*</span></label>
                            <textarea id="food_pairing" class="form-control" name="food_pairing" placeholder="Enter Food Pairing"
                                rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label" for="description_product">Description <span
                                    class="text-danger">*</span></label>
                            <textarea id="description_product" class="form-control" name="description_product"
                                placeholder="Enter Description Product" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.product.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script CK Editor -->
    @include('pages.admin.products.script')
@endsection
