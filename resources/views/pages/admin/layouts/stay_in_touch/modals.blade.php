<!-- Modal Edit -->
@foreach ($stayInTouch as $itemModals)
    <div class="modal fade" id="modalEditHeader{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.stay-in-touch.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="email">Email <span class="text-center">*</span></label>
                            <input class="form-control" type="email" name="email" id="email"
                                value="{{ $itemModals->email }}" placeholder="Enter Email" required />
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
