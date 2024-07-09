@extends('layouts.master-dashboard')
@section('title', 'Show News & Event')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.our-story.index') }}">News & Event</a>
    </li>
    <li class="breadcrumb-item active">Show News or Event</li>
@endsection

@section('content')
    <!-- Alert -->
    @include('layouts.alert-component')

    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Show News or Event</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <label for="image_news_event" class="form-label mb-3">Image</label>
                    <div class="mb-3">
                        @if ($newsEvent->image_news_event)
                            <img src="{{ asset('images/' . $newsEvent->image_news_event) }}" alt="Image Story"
                                class="img-fluid" style="max-width: 100%; max-height: 250px">
                        @else
                            <i class="menu-icon tf-icons bx bx-image" style="font-size: 150px;"></i>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label" for="id_category_news_event">Category <span
                                class="text-danger">*</span></label>
                        <select class="form-select" id="id_category_news_event" disabled>
                            <option disabled selected>Select one</option>
                            @foreach ($categoryNewsEvent as $data)
                                <option value="{{ $data->id }}"
                                    {{ $newsEvent->id_category_news_event == $data->id ? 'selected' : '' }}>
                                    {{ $data->name_category_news_event }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="title_news_event">Title</label>
                        <input class="form-control" id="title_news_event" value="{{ $newsEvent->title_news_event }}"
                            readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_news_event">Date</label>
                        <input class="form-control" id="date_news_event" value="{{ $newsEvent->date_news_event }}"
                            readonly />
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description_news_event">Description <span
                        class="text-danger">*</span></label>
                <textarea id="description_news_event" class="form-control" rows="3" readonly>{{ $newsEvent->description_news_event }}</textarea>
            </div>
            <div class="text-center">
                <a href="{{ route('dashboard.news-event.index') }}" class="btn btn-secondary">Back</a>
            </div>
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
