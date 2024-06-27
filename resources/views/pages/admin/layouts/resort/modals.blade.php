<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.resort.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title_resort">Title</label>
                        <input class="form-control" type="text" id="title_resort" name="title_resort"
                            placeholder="Enter Title Resort" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_resort">Subtitle</label>
                        <input type="text" class="form-control" id="subtitle_resort" name="subtitle_resort"
                            placeholder="Enter Subtitle Resort" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_resort">Description</label>
                        <textarea id="description_resort" class="form-control" name="description_resort" placeholder="Enter description Resort"
                            rows="3" required></textarea>
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
@foreach ($resort as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ({{ $itemModals->title_resort }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.resort.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="title_resort">Title</label>
                            <input class="form-control" type="text" id="title_resort" name="title_resort"
                                value="{{ $itemModals->title_resort }}" placeholder="Enter Title Resort" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_resort">Subtitle</label>
                            <input type="text" class="form-control" id="subtitle_resort" name="subtitle_resort"
                                value="{{ $itemModals->subtitle_resort }}" placeholder="Enter Subtitle Resort"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description_resort">Description</label>
                            <textarea id="description_resort" class="form-control" name="description_resort" placeholder="Enter description Resort"
                                rows="3" required>{{ $itemModals->description_resort }}</textarea>
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
@foreach ($resort as $itemModals)
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
                        <label class="form-label" for="title_resort">Title</label>
                        <input class="form-control" id="title_resort" value="{{ $itemModals->title_resort }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_resort">Subtitle</label>
                        <input class="form-control" id="subtitle_resort" value="{{ $itemModals->subtitle_resort }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_resort">Description</label>
                        <textarea id="description_resort" class="form-control" rows="3" readonly>{{ $itemModals->description_resort }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
