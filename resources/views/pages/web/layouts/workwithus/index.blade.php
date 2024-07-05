@extends('layouts-web.master-web-menu')
@section('title', 'Sumber Air Dewa')
@section('work-with-us', 'active')
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
                        <a href="#" class="brudcrumb-link-active">WORK WITH US</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="text-size-heading text-color-purple ptserif">Our People Are at The Core of Our Success
                    </h2>
                    <p>We are always looking for passionate, talented and dedicated individuals
                        to join our team. If you are interested in working with us, please send your CV and cover letter
                        to </p>
                    <p>&nbsp;</p>
                    <a href="#" class="btn-coklat">VIEW ALL VACANCIES</a>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="enquiry bg-white">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-size-heading text-color-purple ptserif">Join Our Team</h2>
                        <p>If you are interested in joining the team, please tell us a bit about yourself by completing
                            the form below.</p>
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
                                <label for="email">Where are you interested in working?</label>
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
                                <label for="email">What gets you excited about working at Sumber Air Dewa?*</label>
                                <textarea class="form-control" id="message" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Attach your CV here*</label>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <input type="file" class="form-control">
                                        <label for="email">Accepted file types: pdf, doc, docx, Max. file size: 256
                                            MB.*</label>
                                    </div>
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
    </section>
@endsection
