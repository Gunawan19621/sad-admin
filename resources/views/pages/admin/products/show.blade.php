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
                <div class="col-md-4 text-center">
                    <div class=" mb-1 text-center">
                        <label class="form-label">Image Product</label>
                    </div>
                    <div class="mb-3">
                        @if ($product->image_product)
                            <img src="{{ asset('images/' . $product->image_product) }}" alt="Image Story" class="img-fluid"
                                style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="id_sub_category">Sub Category</label>
                                <select class="form-select" id="id_sub_category" disabled>
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
                                <label class="form-label" for="name_product">Name</label>
                                <input class="form-control" id="name_product" value="{{ $product->name_product }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="year_product">Year Product</label>
                                <input class="form-control" id="year_product" value="{{ $product->year_product }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="alcohol">Alcohol</label>
                                <input class="form-control" id="alcohol" value="{{ $product->alcohol }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="temperature">Serving Temperature</label>
                                <input class="form-control" id="temperature" value="{{ $product->temperature }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="cellaring">Cellaring</label>
                                <input class="form-control" id="cellaring" value="{{ $product->cellaring }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="total_acidity">Total Acidity</label>
                                <input class="form-control" id="total_acidity" value="{{ $product->total_acidity }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="ressidual_sugar">Residual Sugar</label>
                                <input class="form-control" id="ressidual_sugar" value="{{ $product->ressidual_sugar }}"
                                    readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="bottle_produced">Bottle Produced</label>
                        <input class="form-control" id="bottle_produced" value="{{ $product->bottle_produced }}"
                            readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="size_bottle">Size Bottle</label>
                        <input class="form-control" id="size_bottle" value="{{ $product->size_bottle }}" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="award_won">Award Won</label>
                        <input class="form-control" id="award_won" value="{{ $product->award_won }}" readonly />
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="sub_product">Subtitle Product</label>
                    <textarea class="form-control" id="sub_product" cols="30" rows="3" readonly>{{ $product->sub_product }}</textarea>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="characteristics">Characteristics</label>
                        <textarea id="characteristics" class="form-control" rows="3" readonly>{{ $product->characteristics }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="testing_note">Testing Note</label>
                        <textarea id="testing_note" class="form-control" rows="3" readonly>{{ $product->testing_note }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="food_pairing">Food Pairing</label>
                        <textarea id="food_pairing" class="form-control" rows="3" readonly>{{ $product->food_pairing }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="description_product">Description</label>
                        <textarea id="description_product" class="form-control" rows="3" readonly>{{ $product->description_product }}</textarea>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.product.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>

    <!-- Script CK Editor -->
    @include('pages.admin.products.script')
@endsection
