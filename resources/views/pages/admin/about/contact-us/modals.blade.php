<!-- Modal Edit -->
@foreach ($contacts as $contact)
    <div class="modal fade bd-example-modal-lg" id="modalEdit{{ $contact->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.contact-us.update', $contact->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="address">Address <span
                                            class="text-danger">*</span></label>
                                    <textarea id="address" class="form-control" name="address" placeholder="Enter Address" rows="3" required>{{ $contact->address }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $contact->email }}" placeholder="Enter Email" required />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="phone" name="phone"
                                        value="{{ $contact->phone }}" placeholder="Enter Phone Number" required
                                        pattern="[0-9+\-\(\)\s]*"
                                        oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '');" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="fax">Fax <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="fax" name="fax"
                                        value="{{ $contact->fax }}" placeholder="Enter fax Number" required
                                        pattern="[0-9+\-\(\)\s]*"
                                        oninput="this.value = this.value.replace(/[^0-9+\-\(\)\s]/g, '');" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="operating_hours">Operating Hours <span
                                            class="text-danger">*</span></label>
                                    <textarea id="operating_hours" class="form-control" name="operating_hours" placeholder="Enter Operating Hours"
                                        rows="3" required>{{ $contact->operating_hours }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Social Media</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="linkedin-addon">
                                            <i class='bx bxl-linkedin'></i>
                                        </span>
                                        <input type="text" class="form-control" id="social_media_linkedin"
                                            name="social_media_linkedin"
                                            value="{{ isset($contact->social_media['linkedin']) ? $contact->social_media['linkedin'] : '' }}"
                                            placeholder="Enter LinkedIn" />
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="instagram-addon">
                                            <i class='bx bxl-instagram'></i>
                                        </span>
                                        <input type="text" class="form-control" id="social_media_instagram"
                                            name="social_media_instagram"
                                            value="{{ isset($contact->social_media['instagram']) ? $contact->social_media['instagram'] : '' }}"
                                            placeholder="Enter Instagram" />
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="facebook-addon">
                                            <i class='bx bxl-facebook'></i>
                                        </span>
                                        <input type="text" class="form-control" id="social_media_facebook"
                                            name="social_media_facebook"
                                            value="{{ isset($contact->social_media['facebook']) ? $contact->social_media['facebook'] : '' }}"
                                            placeholder="Enter Facebook" />
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="youtube-addon">
                                            <i class='bx bxl-youtube'></i>
                                        </span>
                                        <input type="text" class="form-control" id="social_media_youtube"
                                            name="social_media_youtube"
                                            value="{{ isset($contact->social_media['youtube']) ? $contact->social_media['youtube'] : '' }}"
                                            placeholder="Enter YouTube" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="google_maps">Maps <span
                                    class="text-danger">*</span></label>
                            <textarea name="google_maps" id="google_maps" class="form-control" cols="30" rows="3"
                                placeholder="Enter Your Location" required>{{ $contact->google_maps }}</textarea>
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

<!-- Modal Show -->
@foreach ($contacts as $itemModals)
    <div class="modal fade bd-example-modal-lg" id="modalShow{{ $itemModals->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="address">Address</label>
                                <textarea id="address" class="form-control" rows="3" readonly>{{ $itemModals->address }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" id="email" value="{{ $itemModals->email }}"
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control" id="phone" value="{{ $itemModals->phone }}"
                                    readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="fax">Fax</label>
                                <input class="form-control" id="fax" value="{{ $itemModals->fax }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="operating_hours">Operating Hours</label>
                                <textarea id="operating_hours" class="form-control" rows="3" readonly>{{ $itemModals->operating_hours }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Social Media</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="linkedin-addon">
                                        <i class='bx bxl-linkedin'></i>
                                    </span>
                                    <input class="form-control" id="social_media_linkedin"
                                        value="{{ isset($itemModals->social_media['linkedin']) ? $itemModals->social_media['linkedin'] : '' }}"
                                        readonly />
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="instagram-addon">
                                        <i class='bx bxl-instagram'></i>
                                    </span>
                                    <input class="form-control" id="social_media_instagram"
                                        value="{{ isset($itemModals->social_media['instagram']) ? $itemModals->social_media['instagram'] : '' }}"
                                        readonly />
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="facebook-addon">
                                        <i class='bx bxl-facebook'></i>
                                    </span>
                                    <input class="form-control" id="social_media_facebook"
                                        value="{{ isset($itemModals->social_media['facebook']) ? $itemModals->social_media['facebook'] : '' }}"
                                        readonly />
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="youtube-addon">
                                        <i class='bx bxl-youtube'></i>
                                    </span>
                                    <input class="form-control" id="social_media_youtube"
                                        value="{{ isset($itemModals->social_media['youtube']) ? $itemModals->social_media['youtube'] : '' }}"
                                        readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Maps</label>
                        <textarea name="google_maps" id="google_maps" class="form-control" cols="30" rows="3"
                            placeholder="Enter Your Location" readonly>{{ $itemModals->google_maps }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
