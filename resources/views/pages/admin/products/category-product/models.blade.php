<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.category-product.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name_category_product">Name Category <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name_category_product"
                            name="name_category_product" placeholder="Enter Name Category" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_category">Subtitle Category <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" name="subtitle_category" id="subtitle_category" cols="30" rows="4"
                            placeholder="Enter Subtitle Category" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="description_category_product">Description <span
                                class="text-danger">*</span></label>
                        <textarea id="description_category_product" class="form-control" name="description_category_product"
                            placeholder="Enter description Resort" cols="30" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($categoryProduct as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.category-product.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name_category_product">Name Category <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_category_product"
                                name="name_category_product" value="{{ $itemModals->name_category_product }}"
                                placeholder="Enter Name Category" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_category">Name Category <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="subtitle_category" id="subtitle_category" cols="30" rows="4"
                                placeholder="Enter Subtitle Category" required>{{ $itemModals->subtitle_category }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="description_category_product">Description <span
                                    class="text-danger">*</span></label>
                            <textarea id="description_category_product" class="form-control" name="description_category_product"
                                placeholder="Enter description Resort" cols="30" rows="4" required>{{ $itemModals->description_category_product }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
