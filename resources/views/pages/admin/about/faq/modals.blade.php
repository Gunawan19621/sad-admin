<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.faq.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_category_faq">Category FAQ <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_category_faq" name="id_category_faq" required>
                            <option disabled selected>Select one</option>
                            @foreach ($categoryFaq as $data)
                                <option value="{{ $data->id }}">{{ $data->name_category_faq }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="question_faq">Question <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="question_faq" name="question_faq"
                            placeholder="Enter Question" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="answer_faq">Answer <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="answer_faq" id="answer_faq" cols="30" rows="3"
                            placeholder="Enter job Answer Question" required></textarea>
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
@foreach ($faq as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.faq.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_category_faq">Category FAQ <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_category_faq" name="id_category_faq" required>
                                <option disabled selected>Select one</option>
                                @foreach ($categoryFaq as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $itemModals->id_category_faq == $data->id ? 'selected' : '' }}>
                                        {{ $data->name_category_faq }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="question_faq">Question <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="question_faq" name="question_faq"
                                value="{{ $itemModals->question_faq }}" placeholder="Enter Question" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="answer_faq">Answer <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="answer_faq" id="answer_faq" cols="30" rows="3"
                                placeholder="Enter job Answer Question" required>{{ $itemModals->answer_faq }}</textarea>
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
