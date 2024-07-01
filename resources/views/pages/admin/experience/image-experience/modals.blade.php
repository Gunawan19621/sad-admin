<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.image-experience.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_experience">Experience Title <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_experience" name="id_experience" required>
                            <option disabled selected>Select one</option>
                            @foreach ($experience as $data)
                                <option value="{{ $data->id }}">{{ $data->title_experience }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="image_experience" class="form-label">Image <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image_experience" name="image_experience"
                            accept="image/*" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
@foreach ($imageExperience as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.image-experience.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_experience">Experience Title <span
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
                        <div class="">
                            <label for="image_experience" class="form-label">Image <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_experience" name="image_experience"
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
@endforeach
