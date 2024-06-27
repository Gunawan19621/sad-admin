<!-- Modal Edit -->
@foreach ($ourVision as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ({{ $itemModals->title_vision }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.our-vision.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="title_vision">Title Vision</label>
                            <input class="form-control" type="text" id="title_vision" name="title_vision"
                                value="{{ $itemModals->title_vision }}" placeholder="Enter title vision" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description_vision">Description Vision</label>
                            <textarea id="description_vision" class="form-control" name="description_vision" placeholder="Enter description vision"
                                rows="3">{{ $itemModals->description_vision }}</textarea>
                        </div>
                        <div class="">
                            <label for="image_vision" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image_vision" name="image_vision" />
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
@foreach ($ourVision as $itemModals)
    <div class="modal fade" id="modalShow{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show ({{ $itemModals->name_team }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title_vision">Title Vision</label>
                        <input class="form-control" id="title_vision" value="{{ $itemModals->title_vision }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_vision">Description Vision</label>
                        <textarea id="description_vision" class="form-control" rows="3" readonly>{{ $itemModals->description_vision }}</textarea>
                    </div>
                    <div class="">
                        <label for="image_vision" class="form-label">Image Vision</label>
                    </div>
                    <div class="">
                        <img src="{{ asset('images/' . $itemModals->image_vision) }}" alt="Image Team" class="img-fluid"
                            style="max-width: 100px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
