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
                        <a href="#" class="brudcrumb-link-active">CONTACT US</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">CONTACT US</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row display-flex">
                <div class="col-lg-6">
                    <h4 class="text-size-title text-color-purple">CONTACT US</h4><br>
                    <h6 class="roboto text-bold text-color-black">ADDRESS</h6><br>
                    <p>{!! $contact->address !!}</p><br>
                    <H6 class="roboto text-bold text-color-black">OPERATING HOURS</H6><br>
                    <p>{!! $contact->operating_hours !!}</p>

                    <p><b>P.</b> {{ $contact->phone }} <br>
                        <b>F.</b> {{ $contact->fax }}<br>
                        <b>E.</b> {{ $contact->email }}
                    </p>
                    <a href="#">
                        <button class="btn-coklat">GET DIRECTIONS</button></a>
                </div>
                <div class="col-lg-6">
                    {!! $contact->google_maps !!}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="enquiry bg-white">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-size-heading text-color-purple ptserif">ENQUIRY</h2>
                    </div>
                </div>
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Your Name*</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Phone Number*</label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email Address*</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Why are you enquiring?</label>
                                <select class="form-control" id="enquiry">
                                    <option>General Enquiry</option>
                                    <option>Winery Tour</option>
                                    <option>Wine & Dine</option>
                                    <option>Wine Spa</option>
                                    <option>Resort</option>
                                    <option>Activities</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Message*</label>
                                <textarea class="form-control" id="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Sign up to our newsletter*</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    Yes Please
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    No Thanks
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn-purple">SUBMIT</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        </div>
    </section>

@endsection
