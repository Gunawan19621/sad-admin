<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.activiti-price.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_activiti">Activiti Name <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_activiti" name="id_activiti" required>
                            <option disabled selected>Select one</option>
                            @foreach ($activiti as $data)
                                <option value="{{ $data->id }}">{{ $data->title_activiti }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price_activiti">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input class="form-control" type="number" id="price_activiti" name="price_activiti"
                                placeholder="Enter Activiti Price" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name_price">Price Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name_price" name="name_price"
                            placeholder="Enter Price Name" required />
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
@foreach ($activitiPrice as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.activiti-price.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_activiti">Activiti Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_activiti" name="id_activiti" required>
                                <option disabled selected>Select one</option>
                                @foreach ($activiti as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $itemModals->id_activiti == $data->id ? 'selected' : '' }}>
                                        {{ $data->title_activiti }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price_activiti">Price <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input class="form-control" type="number" id="price_activiti" name="price_activiti"
                                    value="{{ $itemModals->price_activiti }}" placeholder="Enter Experience Price"
                                    required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name_price">Price Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_price" name="name_price"
                                value="{{ $itemModals->name_price }}" placeholder="Enter Activiti Name" required />
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
