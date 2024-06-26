<!-- Modal Edit -->
@foreach ($menuHeader as $itemModals)
    <div class="modal fade" id="modalEditHeader{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Header</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.menu-header.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama Menu</label>
                            <input class="form-control" id="basic-default-fullname" value="{{ $itemModals->name_menu }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="title_header">Title Header</label>
                            <input type="text" class="form-control" id="title_header" name="title_header"
                                value="{{ $itemModals->title_header }}" placeholder="Enter Title Header" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_header">Subtitle Header</label>
                            <textarea id="subtitle_header" class="form-control" name="subtitle_header" placeholder="Enter Subtitle Header"
                                rows="3">{{ $itemModals->subtitle_header }}</textarea>
                        </div>
                        <div class="">
                            <label for="image_header" class="form-label">Image Header <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_header" name="image_header"
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
