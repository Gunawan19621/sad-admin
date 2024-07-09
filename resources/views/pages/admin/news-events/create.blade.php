@extends('layouts.master-dashboard')
@section('title', 'Create News & Event')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-story.index') }}">News & Event</a>
    </li>
    <li class="breadcrumb-item active">Create News or Event</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create News or Event</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.news-event.store') }}" method="POST" enctype="multipart/form-data"
                id="inputanForm">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="id_category_news_event">Category<span
                            class="text-danger">*</span></label>
                    <select class="form-select" id="id_category_news_event" name="id_category_news_event" required>
                        <option disabled selected>Select one</option>
                        @foreach ($categoryNewsEvent as $data)
                            <option value="{{ $data->id }}">{{ $data->name_category_news_event }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="title_news_event">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title_news_event" name="title_news_event"
                        placeholder="Enter Title News or Event" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="date_news_event">Date</label>
                    <input type="date" class="form-control" id="date_news_event" name="date_news_event"
                        placeholder="Enter Date" />
                </div>
                <div class="mb-3">
                    <label for="image_news_event" class="form-label">Image <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="image_news_event" name="image_news_event"
                        accept="image/*" required />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description_news_event">Description <span
                            class="text-danger">*</span></label>
                    <textarea id="description_news_event" class="form-control" name="description_news_event"
                        placeholder="Enter Description Product" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <a href="{{ route('dashboard.news-event.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        CKEDITOR.replace('description_news_event', {
            toolbar: [{
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft',
                        'JustifyCenter', 'JustifyRight'
                    ]
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                },
            ],
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
