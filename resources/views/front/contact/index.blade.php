@extends('layouts.master')

@section('content')
<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>Contact Us</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class="bx bx-chevrons-right"></i>
                </li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <div class="inner-shape">
        <img src="assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>
<div class="contact-form-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Let's Send Us a Message Below</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4">
                <div class="contact-info mr-20">
                    <span>Contact Info</span>
                    <h2>Let's Connect With Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam imperdiet varius mi, ut hendrerit magna mollis ac. </p>
                    <ul>
                        @if (!empty($web_phone))
                        <li>
                            <div class="content">
                                <i class='bx bx-phone-call'></i>
                                <h3>Phone Number</h3>
                                <a href="tel:{{ $web_phone }}">{{ $web_phone }}1</a>
                            </div>
                        </li>
                        @endif
                        @if (!empty($web_address))
                        <li>
                            <div class="content">
                                <i class='bx bxs-map'></i>
                                <h3>Address</h3>
                                <span>{{ $web_address }}</span>
                            </div>
                        </li>
                        @endif
                        @if (!empty($web_email))
                        <li>
                            <div class="content">
                                <i class='bx bx-message'></i>
                                <h3>Contact Info</h3>
                                <a href="mailto:{{ $web_email }}"><span class="__cf_email__" >{{ $web_email }}</span></a>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form">
                    <form id="contactForm" action="{{ route('front.contact.save') }}" method="POST">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Name <span>*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Please Enter Your Name" placeholder="Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Your Email <span>*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Please Enter Your Email" placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Phone Number <span>*</span></label>
                                    <input type="text" name="phone" id="phone_number" required data-error="Please Enter Your number" class="form-control" placeholder="Phone Number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Your Message <span>*</span></label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="agree-label">
                                    <input type="checkbox" id="chb1">
                                    <label for="chb1">
                                        Accept <a href="#">Terms & Conditions</a> And <a href="#">Privacy Policy.</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 text-center">
                                <button type="submit" class="default-btn btn-bg-two border-radius-50">
                                    Send Message <i class='bx bx-chevron-right'></i>
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (!empty($google_map_url))
<div class="map-area">
    <div class="container-fluid m-0 p-0">
        <iframe src="{{ $google_map_url }}"></iframe>
    </div>
</div>
@endif
@endsection
