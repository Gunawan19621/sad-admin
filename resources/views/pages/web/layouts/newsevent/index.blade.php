@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('news-event', 'active')
@section('content')
    <div>
        <img src="{{ asset('images/' . $headers->image_header) }}" alt="Full Width Image" class="full-width-image">
    </div>

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="#" class="brudcrumb-link-active">NEWS & EVENTS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">

                @foreach ($news as $item)
                    <div class="col-md-4">
                        <div class="container text-center">
                            <img src="{{ asset('images/' . $item->image_news_event) }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                alt="Image" class="full-width-image">
                            <p class="text-size-subtitle text-color-black text-bold">{{ $item->title_news_event }}
                            </p>
                            <p>
                                {!! Str::limit(strip_tags($item->description_news_event, 150)) !!}</p>

                            <a href="{{ route('activities.show', $item->id) }}" class="robotoflex link">READ MORE</a>
                            <br><br>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 pagination-center">
                    {{ $news->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>



@endsection
