<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.experience.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title_experience">Title</label>
                        <input class="form-control" type="text" id="title_experience" name="title_experience"
                            placeholder="Enter Title Experience" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_experience">Subtitle</label>
                        <textarea id="subtitle_experience" class="form-control" name="subtitle_experience"
                            placeholder="Enter Subtitle Experience" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_experience">Description</label>
                        <textarea id="description_experience" class="form-control" name="description_experience"
                            placeholder="Enter description story" rows="3"></textarea>
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
@foreach ($experience as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ({{ $itemModals->title_experience }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.experience.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="title_experience">Title</label>
                            <input class="form-control" type="text" id="title_experience" name="title_experience"
                                placeholder="Enter Title Experience" value="{{ $itemModals->title_experience }}"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_experience">Subtitle</label>
                            <textarea id="subtitle_experience" class="form-control" name="subtitle_experience"
                                placeholder="Enter Subtitle Experience" rows="3" required>{{ $itemModals->subtitle_experience }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description_experience">Description</label>
                            <textarea id="description_experience" class="form-control" name="description_experience"
                                placeholder="Enter description story" rows="3">{{ $itemModals->description_experience }}</textarea>
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
@foreach ($experience as $itemModals)
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
                        <label class="form-label" for="title_experience">Title</label>
                        <input class="form-control" id="title_experience" value="{{ $itemModals->title_experience }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="subtitle_experience">Subtitle</label>
                        <textarea id="subtitle_experience" class="form-control" rows="3" readonly>{{ $itemModals->subtitle_experience }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_experience">Description</label>
                        <textarea id="description_experience" class="form-control" rows="3" readonly>{{ $itemModals->description_experience }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
