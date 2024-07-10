<!-- Modal Edit -->
@foreach ($menuHeader as $itemModals)
    <div class="modal fade" id="modalEditHeader{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <div class="">
                                    <label class="form-label">Image</label>
                                </div>
                                <div class="mb-3">
                                    @if ($itemModals->image_header)
                                        <img src="{{ asset('images/' . $itemModals->image_header) }}" alt="Image"
                                            class="img-fluid" style="max-width: 100%; max-height: 250px">
                                    @else
                                        <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama Menu</label>
                                    <input class="form-control" id="basic-default-fullname"
                                        value="{{ $itemModals->name_menu }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="title_header">Title Header</label>
                                    <input type="text" class="form-control" id="title_header" name="title_header"
                                        value="{{ $itemModals->title_header }}" placeholder="Enter Title Header" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image_header" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image_header" name="image_header"
                                accept="image/*" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="subtitle_header">Subtitle Header</label>
                            <textarea id="subtitle_header" class="form-control" name="subtitle_header" placeholder="Enter Subtitle Header"
                                rows="3">{{ $itemModals->subtitle_header }}</textarea>
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
