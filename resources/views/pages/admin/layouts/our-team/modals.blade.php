<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Team</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.our-team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="name_team">Name</label>
                        <input class="form-control" type="text" id="name_team" name="name_team"
                            placeholder="Enter Team Name" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="job_team">Job</label>
                        <input type="text" class="form-control" id="job_team" name="job_team"
                            placeholder="Enter job posotion" required />
                    </div>
                    <div class="">
                        <label for="image_team" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image_team" name="image_team" />
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
@foreach ($ourTeam as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit ({{ $itemModals->name_team }})</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.our-team.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="name_team">Name</label>
                            <input class="form-control" type="text" id="name_team" name="name_team"
                                value="{{ $itemModals->name_team }}" placeholder="Enter Team Name" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="job_team">Job</label>
                            <input type="text" class="form-control" id="job_team" name="job_team"
                                value="{{ $itemModals->job_team }}" placeholder="Enter job posotion" required />
                        </div>
                        <div class="">
                            <label for="image_team" class="form-label">Image</label>
                            <input class="form-control" type="file" id="image_team" name="image_team" />
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
