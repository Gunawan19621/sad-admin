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
                    <h6 class="roboto text-bold text-color-black">ADDRESS</h6><br>
                    <p>{!! $contact->address !!}</p><br>
                    <H6 class="roboto text-bold text-color-black">OPERATING HOURS</H6><br>
                    <p>{!! $contact->operating_hours !!}</p>
                    <P>
                        <b>P.</b> {{ $contact->phone }} <br>
                        <b>F.</b> {{ $contact->fax }} <br>
                        <b>E.</b> {{ $contact->email }}
                    </P>
                    <a href="#">
                        <button class="btn-coklat">GET DIRECTIONS</button></a>
                </div>
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.887244988517!2d115.06848397515114!3d-8.510327791531783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2318c1faf71ed%3A0xcc163e4fa8ac5f8e!2sSumber%20Air%20Dewa%20Suade%20Winery!5e0!3m2!1sen!2sid!4v1719287785590!5m2!1sen!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
