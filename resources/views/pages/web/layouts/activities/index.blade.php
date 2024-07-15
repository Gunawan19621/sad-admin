@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('activities', 'active')
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
                        <a href="#" class="brudcrumb-link-active">ACTIVITIES</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">

                @foreach ($activities as $item)
                    <div class="col-md-4">
                        <div class="container text-center">
                            <img src="{{ asset('images/' . $item->image_activiti) }}"
                                onerror="this.onerror=null;this.src='{{ asset('assets-web/img/default-image.png') }}';"
                                alt="Image" class="full-width-image">
                            <p class="text-size-subtitle text-color-black text-bold">{{ $item->title_activiti }}
                            </p>
                            <p>
                                {!! Str::limit(strip_tags($item->description_activiti, 150)) !!}</p>

                            <a href="{{ route('activities.show', $item->id) }}" class="robotoflex link">READ MORE</a>
                            <br><br>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-md-12 pagination-center">
                    {{ $activities->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>



@endsection
