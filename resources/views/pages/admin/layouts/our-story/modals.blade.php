<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-Story">
                <h5 class="modal-title" id="exampleModalLabel">Create New Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.our-story.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title_story">Title Story</label>
                        <input class="form-control" type="text" id="title_story" name="title_story"
                            placeholder="Enter Title Story" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="year_story">Year Story</label>
                        <input class="form-control" type="number" id="year_story" name="year_story"
                            placeholder="Enter Title Story" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_story">Description Story</label>
                        <textarea id="description_story" class="form-control" name="description_story" placeholder="Enter description story"
                            rows="3"></textarea>
                    </div>
                    <div class="">
                        <label for="image_story" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="image_story" name="image_story" />
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
@foreach ($ourStory as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-Story">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ({{ $itemModals->title_story }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.our-story.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="title_story">Title Story</label>
                            <input class="form-control" type="text" id="title_story" name="title_story"
                                value="{{ $itemModals->title_story }}" placeholder="Enter Title Story" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="year_story">Year Story</label>
                            <input class="form-control" type="number" id="year_story" name="year_story"
                                value="{{ $itemModals->year_story }}" placeholder="Enter Title Story" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description_story">Description Story</label>
                            <textarea id="description_story" class="form-control" name="description_story" placeholder="Enter description story"
                                rows="3">{{ $itemModals->description_story }}</textarea>
                        </div>
                        <div class="">
                            <label for="image_story" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image_story" name="image_story" />
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
@foreach ($ourStory as $itemModals)
    <div class="modal fade" id="modalShow{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show ({{ $itemModals->title_story }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title_story">Title Story</label>
                        <input class="form-control" id="title_story" value="{{ $itemModals->title_story }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="year_story">Year Story</label>
                        <input class="form-control" id="year_story" value="{{ $itemModals->year_story }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="description_story">Description Story</label>
                        <textarea id="description_story" class="form-control" rows="3" readonly>{{ $itemModals->description_story }}</textarea>
                    </div>
                    <div class="">
                        <label for="image_story" class="form-label">Image Story</label>
                    </div>
                    <div class="">
                        <img src="{{ asset('images/' . $itemModals->image_story) }}" alt="Image Story"
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
