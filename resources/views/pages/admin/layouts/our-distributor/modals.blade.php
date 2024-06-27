<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.our-distributor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name_distributor">Name</label>
                        <input class="form-control" type="text" id="name_distributor" name="name_distributor"
                            placeholder="Enter Name Distributor" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name_person_distributor">Name Person</label>
                        <input type="text" class="form-control" id="name_person_distributor"
                            name="name_person_distributor" placeholder="Enter Name Person" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone_distributor">Phone</label>
                        <input type="text" class="form-control" id="phone_distributor" name="phone_distributor"
                            placeholder="Enter Phone Number" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address_distributor">Address</label>
                        <textarea id="address_distributor" class="form-control" name="address_distributor"
                            placeholder="Enter Address Distributor" rows="3" required></textarea>
                    </div>
                    <div class="">
                        <label for="image_distributor" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="image_distributor" name="image_distributor" />
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
@foreach ($ourDistributor as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.our-distributor.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name_distributor">Name</label>
                            <input class="form-control" type="text" id="name_distributor" name="name_distributor"
                                value="{{ $itemModals->name_distributor }}" placeholder="Enter Name Distributor"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="name_person_distributor">Name Person</label>
                            <input type="text" class="form-control" id="name_person_distributor"
                                name="name_person_distributor" value="{{ $itemModals->name_person_distributor }}"
                                placeholder="Enter Name Person" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone_distributor">Phone</label>
                            <input type="text" class="form-control" id="phone_distributor"
                                name="phone_distributor" value="{{ $itemModals->phone_distributor }}"
                                placeholder="Enter Phone Number" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address_distributor">Address</label>
                            <textarea id="address_distributor" class="form-control" name="address_distributor"
                                placeholder="Enter Address Distributor" rows="3" required>{{ $itemModals->address_distributor }}</textarea>
                        </div>
                        <div class="">
                            <label for="image_distributor" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image_distributor"
                                name="image_distributor" />
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
@foreach ($ourDistributor as $itemModals)
    <div class="modal fade" id="modalShow{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name_distributor">Name</label>
                        <input class="form-control" id="name_distributor" value="{{ $itemModals->name_distributor }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="name_person_distributor">Name Person</label>
                        <input class="form-control" id="name_person_distributor"
                            value="{{ $itemModals->name_person_distributor }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="phone_distributor">Phone</label>
                        <input class="form-control" id="phone_distributor"
                            value="{{ $itemModals->phone_distributor }}" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address_distributor">Address</label>
                        <textarea id="address_distributor" class="form-control" rows="3" readonly>{{ $itemModals->address_distributor }}</textarea>
                    </div>
                    <div class="">
                        <label for="image_distributor" class="form-label">Image Header</label>
                    </div>
                    <div class="">
                        <img src="{{ asset('images/' . $itemModals->image_distributor) }}" alt="Image Distributor"
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
