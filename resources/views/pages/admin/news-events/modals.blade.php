<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create News & Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.news-event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="id_category_news_event">Category <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_category_news_event" name="id_category_news_event" required>
                            <option disabled selected>Select one</option>
                            @foreach ($categoryNewsEvent as $data)
                                <option value="{{ $data->id }}">{{ $data->name_category_news_event }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="title_news_event">Title <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title_news_event" name="title_news_event"
                            placeholder="Enter Title News or Event" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_news_event">Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="date_news_event" name="date_news_event"
                            placeholder="Enter Date" required />
                    </div>
                    <div class="mb-3">
                        <label for="image_news_event" class="form-label">Image <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="image_news_event" name="image_news_event"
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
@foreach ($newsEvent as $itemModals)
    <div class="modal fade" id="modalEdit{{ $itemModals->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit News & Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('dashboard.news-event.update', $itemModals->id) }}" method="POST"
                    enctype="multipart/form-data" id="inputanForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_category_news_event">Category News & Event <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="id_category_news_event" name="id_category_news_event"
                                required>
                                <option disabled selected>Select one</option>
                                @foreach ($categoryNewsEvent as $data)
                                    <option value="{{ $data->id }}"
                                        {{ $itemModals->id_category_news_event == $data->id ? 'selected' : '' }}>
                                        {{ $data->name_category_news_event }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="title_news_event">Title <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title_news_event" name="title_news_event"
                                value="{{ $itemModals->title_news_event }}" placeholder="Enter Title News or Event"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="date_news_event">Date <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_news_event" name="date_news_event"
                                value="{{ $itemModals->date_news_event }}" placeholder="Enter Date" required />
                        </div>
                        <div class="mb-3">
                            <label for="image_news_event" class="form-label">Image <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image_news_event" name="image_news_event"
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
@endforeach
