<!-- Modal Edit -->
@foreach ($enquiry as $itemModals)
    <div class="modal fade bd-example-modal-lg" id="modalEdit{{ $itemModals->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Enquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.enquiry.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $itemModals->name }}" placeholder="Enter Name" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ $itemModals->email }}" placeholder="Eneter Email" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="phone" name="phone"
                                        value="{{ $itemModals->phone }}" placeholder="Enter Phone Number" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="enquiring">Enquiring</label>
                                    <input class="form-control" type="text" id="enquiring" name="enquiring"
                                        value="{{ $itemModals->enquiring }}" placeholder="Enter Enquiring" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="our_newsletter">Our Newsletter <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="our_newsletter" name="our_newsletter" required>
                                <option disabled selected>Select one</option>
                                <option value="ya" {{ $itemModals->our_newsletter == 'ya' ? 'selected' : '' }}>Ya
                                </option>
                                <option value="no" {{ $itemModals->our_newsletter == 'no' ? 'selected' : '' }}>No
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="message">Message <span class="text-danger">*</span></label>
                            <textarea id="message" name="message" placeholder="Enter Message" class="form-control" rows="3" required>{{ $itemModals->message }}</textarea>
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
