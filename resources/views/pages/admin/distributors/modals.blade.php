<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Dustributor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.our-distributor.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name_distributor">Name Distributor <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name_distributor" name="name_distributor"
                            placeholder="Enter Name Distributor" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name_person_distributor">Name Person <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name_person_distributor"
                            name="name_person_distributor" placeholder="Enter Name Person" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone_distributor">Phone <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="phone_distributor" name="phone_distributor"
                            placeholder="Enter Phone Number" required pattern="[0-9+\-\(\)\s]*"
                            oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '');" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address_distributor">Address <span
                                class="text-danger">*</span></label>
                        <textarea id="address_distributor" class="form-control" name="address_distributor"
                            placeholder="Enter Address Distributor" rows="3" required></textarea>
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

<!-- Modal Edit -->
@foreach ($ourDistributor as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Dustributor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.our-distributor.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name_distributor">Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="name_distributor" name="name_distributor"
                                value="{{ $itemModals->name_distributor }}" placeholder="Enter Name Distributor"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name_person_distributor">Name Person <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name_person_distributor"
                                name="name_person_distributor" value="{{ $itemModals->name_person_distributor }}"
                                placeholder="Enter Name Person" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone_distributor">Phone <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_distributor"
                                value="{{ $itemModals->phone_distributor }}" name="phone_distributor"
                                placeholder="Enter Phone Number" required pattern="[0-9+\-\(\)\s]*"
                                oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '');" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address_distributor">Address <span
                                    class="text-danger">*</span></label>
                            <textarea id="address_distributor" class="form-control" name="address_distributor"
                                placeholder="Enter Address Distributor" rows="3" required>{{ $itemModals->address_distributor }}</textarea>
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
