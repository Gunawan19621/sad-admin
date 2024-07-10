@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('about', 'active')
@section('content')

    <section class="section-brudcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brudcrumb">
                        <a href="#" class="brudcrumb-link">HOME</a> /
                        <a href="#" class="brudcrumb-link">ABOUT</a> /
                        <a href="#" class="brudcrumb-link-active">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">FAQs</h2>
                </div>
            </div>

            @foreach ($faq as $item)
                <div class="row">
                    <div class="col-md-12">
                        <p>&nbsp;</p>
                        <h6 class="text-size-title text-color-purple">{{ $item->name_category_faq }}</h6>

                        @foreach ($item->faq as $item2)
                            <div class="faq">
                                <button class="accordion">
                                    {{ $item2->question_faq }}
                                    <i class="fa fa-plus"></i>
                                </button>
                                <div class="pannel">
                                    <p>
                                        {{ $item2->answer_faq }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach


        </div>
    </section>
@endsection
