<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Dustributor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.our-distributor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name_distributor">Name <span class="text-danger">*</span></label>
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
                            placeholder="Enter Phone Number" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address_distributor">Address <span
                                class="text-danger">*</span></label>
                        <textarea id="address_distributor" class="form-control" name="address_distributor"
                            placeholder="Enter Address Distributor" rows="3" required></textarea>
                    </div>
                    <div class="">
                        <label for="image_distributor" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image_distributor" name="image_distributor"
                            accept="image/*" />
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
@foreach ($ourDistributor as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <label for="image_distributor" class="form-label mb-3">Image</label>
                                <div class="mb-3">
                                    @if ($itemModals->image_distributor)
                                        <img src="{{ asset('images/' . $itemModals->image_distributor) }}"
                                            alt="Image Story" class="img-fluid"
                                            style="max-width: 100%; max-height: 250px">
                                    @else
                                        <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label" for="name_distributor">Name <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="name_distributor"
                                        name="name_distributor" value="{{ $itemModals->name_distributor }}"
                                        placeholder="Enter Name Distributor" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="name_person_distributor">Name Person <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_person_distributor"
                                        name="name_person_distributor"
                                        value="{{ $itemModals->name_person_distributor }}"
                                        placeholder="Enter Name Person" required />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="phone_distributor">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone_distributor"
                                        name="phone_distributor" value="{{ $itemModals->phone_distributor }}"
                                        placeholder="Enter Phone Number" required />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="address_distributor">Address <span
                                    class="text-danger">*</span></label>
                            <textarea id="address_distributor" class="form-control" name="address_distributor"
                                placeholder="Enter Address Distributor" rows="3" required>{{ $itemModals->address_distributor }}</textarea>
                        </div>
                        <div class="">
                            <label for="image_distributor" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image_distributor"
                                name="image_distributor" accept="image/*" />
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

<!-- Modal Show -->
@foreach ($ourDistributor as $itemModals)
    <div class="modal fade" id="modalShow{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Dustributor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <label for="image_distributor" class="form-label mb-3">Image</label>
                            <div class="mb-3">
                                @if ($itemModals->image_distributor)
                                    <img src="{{ asset('images/' . $itemModals->image_distributor) }}"
                                        alt="Image Story" class="img-fluid"
                                        style="max-width: 100%; max-height: 250px">
                                @else
                                    <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="name_distributor">Name</label>
                                <input class="form-control" id="name_distributor"
                                    value="{{ $itemModals->name_distributor }}" readonly />
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
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="address_distributor">Address</label>
                        <textarea id="address_distributor" class="form-control" rows="3" readonly>{{ $itemModals->address_distributor }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
