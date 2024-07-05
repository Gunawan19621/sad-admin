<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Activiti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.activiti.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="title_activiti">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title_activiti" name="title_activiti"
                            placeholder="Enter Title Activiti" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_activiti">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="date_activiti" name="date_activiti"
                            placeholder="Enter Date Activiti" required />
                    </div>
                    <div class="mb-3">
                        <label for="image_activiti" class="form-label">Image <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image_activiti" name="image_activiti"
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

<!-- Modal Edit -->
@foreach ($activiti as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit News & Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.activiti.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <label for="image_activiti" class="form-label mb-3">Image</label>
                                <div class="mb-3">
                                    @if ($itemModals->image_activiti)
                                        <img src="{{ asset('images/' . $itemModals->image_activiti) }}"
                                            alt="Image Story" class="img-fluid"
                                            style="max-width: 100%; max-height: 250px">
                                    @else
                                        <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="title_activiti">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_activiti" name="title_activiti"
                                        value="{{ $itemModals->title_activiti }}" placeholder="Enter Title Activiti"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="date_activiti">Date <span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="date_activiti" name="date_activiti"
                                        value="{{ $itemModals->date_activiti }}" placeholder="Enter Date Activiti"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="image_activiti" class="form-label">Image <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="image_activiti"
                                        name="image_activiti" accept="image/*" required />
                                </div>
                            </div>
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
