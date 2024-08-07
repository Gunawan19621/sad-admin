<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.experience-price.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_experience">Name <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_experience" name="id_experience" required>
                            <option disabled selected>Select one</option>
                            @foreach ($experience as $data)
                                <option value="{{ $data->id }}">{{ $data->title_experience }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price_experience">Price <span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input class="form-control" type="number" id="price_experience" name="price_experience"
                                placeholder="Enter Experience Price" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="unit_experience">Unit <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="unit_experience" name="unit_experience"
                            placeholder="Enter Experience Unit" required />
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
@foreach ($experiencePrice as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.experience-price.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_experience">Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_experience" name="id_experience" required>
                                <option disabled selected>Select one</option>
                                @foreach ($experience as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $itemModals->id_experience == $data->id ? 'selected' : '' }}>
                                        {{ $data->title_experience }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price_experience">Price <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <input class="form-control" type="number" id="price_experience" name="price_experience"
                                    value="{{ $itemModals->price_experience }}" placeholder="Enter Experience Price"
                                    required />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="unit_experience">Unit <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="unit_experience" name="unit_experience"
                                value="{{ $itemModals->unit_experience }}" placeholder="Enter Experience Unit"
                                required />
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
