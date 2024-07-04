<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.sub-category-product.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_category_product">Category Product<span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_category_product" name="id_category_product" required>
                            <option disabled selected>Select one</option>
                            @foreach ($categoryProduct as $data)
                                <option value="{{ $data->id }}">{{ $data->name_category_product }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name_sub_category">Name Sub Category <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name_sub_category" name="name_sub_category"
                            placeholder="Enter Name Sub Category" required />
                    </div>
                    <div class="mb-3">
                        <label for="image_sub_category" class="form-label">Image <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image_sub_category" name="image_sub_category"
                            accept="image/*" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($subCategory as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.sub-category-product.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <label for="image_sub_category" class="form-label mb-3">Image</label>
                                <div class="mb-3">
                                    @if ($itemModals->image_sub_category)
                                        <img src="{{ asset('images/' . $itemModals->image_sub_category) }}"
                                            alt="Image Story" class="img-fluid"
                                            style="max-width: 100%; max-height: 250px">
                                    @else
                                        <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="id_category_product">Category Product<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="id_category_product" name="id_category_product"
                                        required>
                                        <option disabled selected>Select one</option>
                                        @foreach ($categoryProduct as $data)
                                            <option
                                                value="{{ $data->id }}"{{ $itemModals->id_category_product == $data->id ? 'selected' : '' }}>
                                                {{ $data->name_category_product }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="name_sub_category">Name Sub Category <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_sub_category"
                                        name="name_sub_category" value="{{ $itemModals->name_sub_category }}"
                                        placeholder="Enter Name Sub Category" required />
                                </div>
                                <div class="mb-3">
                                    <label for="image_sub_category" class="form-label">Image <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="image_sub_category"
                                        name="image_sub_category" accept="image/*" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
