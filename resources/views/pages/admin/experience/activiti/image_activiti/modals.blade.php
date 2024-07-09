<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.image-activiti.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_activiti">Title Activiti <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_activiti" name="id_activiti" required>
                            <option disabled selected>Select one</option>
                            @foreach ($activiti as $data)
                                <option value="{{ $data->id }}">{{ $data->title_activiti }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*"
                            required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($imageActiviti as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.image-activiti.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <label for="image" class="form-label mb-3">Image</label>
                                <div class="mb-3">
                                    @if ($itemModals->image)
                                        <img src="{{ asset('images/' . $itemModals->image) }}" alt="image"
                                            class="img-fluid" style="max-width: 100%; max-height: 250px">
                                    @else
                                        <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="id_activiti">Title Activiti <span
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
                                <div class="">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="image" name="image"
                                        accept="image/*" />
                                </div>
                            </div>
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
