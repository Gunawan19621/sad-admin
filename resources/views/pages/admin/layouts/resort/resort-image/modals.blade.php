<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Image Resort</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.resort-image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_resort">Title Resort</label>
                        <select class="form-select" id="id_resort" name="id_resort" required>
                            <option disabled selected>Open this select menu</option>
                            @foreach ($resort as $data)
                                <option value="{{ $data->id }}">{{ $data->title_resort }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="image_resort" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="image_resort" name="image_resort" />
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
@foreach ($resortImage as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.resort-image.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_resort">Title Resort</label>
                            <select class="form-select" id="id_resort" name="id_resort" required>
                                <option disabled selected>Open this select menu</option>
                                @foreach ($resort as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $itemModals->id_resort == $data->id ? 'selected' : '' }}>
                                        {{ $data->title_resort }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="image_resort" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image_resort" name="image_resort" />
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
@endforeach

<!-- Modal Show -->
@foreach ($resortImage as $itemModals)
    <div class="modal fade" id="modalShow{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_experience">Title</label>
                        <select class="form-select" id="id_experience" disabled>
                            <option disabled selected>Open this select menu</option>
                            @foreach ($resort as $data)
                                <option value="{{ $data->id }}"
                                    {{ $itemModals->id_resort == $data->id ? 'selected' : '' }}>
                                    {{ $data->title_resort }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="image_resort" class="form-label">Foto</label>
                    </div>
                    <div class="">
                        <img src="{{ asset('images/' . $itemModals->image_resort) }}" alt="Image Resort"
                            class="img-fluid" style="max-width: 100px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
