@extends('layouts.master')

@section('content')
<div class="inner-banner">
    <div class="container">
        <div class="inner-title text-center">
            <h3>{{ __('Contact Us') }}</h3>
            <ul>
                <li>
                    <a href="{{ url('/') }}">{{ __('Home') }}</a>
                </li>
                <li>
                    <i class="bx bx-chevrons-right"></i>
                </li>
                <li>{{ __('Contact Us') }}</li>
            </ul>
        </div>
    </div>
    <div class="inner-shape">
        <img src="/images/shape/inner-shape.png" alt="Images">
    </div>
</div>
<div class="contact-form-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>Gửi tin nhắn cho chúng tôi theo mẫu dưới đây</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4">
                <div class="contact-info mr-20">
                    <span>{{ __('Contact Info') }}</span>
                    <h2>Liên hệ với chúng tôi</h2>
                    <p>Bạn có thể trò chuyện cùng chúng tôi bất cứ thời điểm nào, cùng những chuyên gia giàu kinh nghiệm sẵn sàng hỗ trợ bạn bất cứ lúc nào, 24/7/365</p>
                    <ul>
                        @if (!empty($web_phone))
                        <li>
                            <div class="content">
                                <i class='bx bx-phone-call'></i>
                                <h3>{{ __('Phone Number') }}</h3>
                                <a href="tel:{{ $web_phone }}">{{ $web_phone }}</a>
                            </div>
                        </li>
                        @endif
                        @if (!empty($web_address))
                        <li>
                            <div class="content">
                                <i class='bx bxs-map'></i>
                                <h3>{{ __('Address') }}</h3>
                                <span>{{ $web_address }}</span>
                            </div>
                        </li>
                        @endif
                        @if (!empty($web_email))
                        <li>
                            <div class="content">
                                <i class='bx bx-message'></i>
                                <h3>{{ __('Email') }}</h3>
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
                                    <label>{{ __('Your Name') }} <span>*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" required data-error="Vui lòng nhập tên" placeholder="Nguyễn Văn A">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>{{ __('Your Email') }} <span>*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" required data-error="Vui lòng nhập email" placeholder="xxx@gmail.com">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Phone Number') }} <span>*</span></label>
                                    <input type="text" name="phone" id="phone_number" required data-error="Vui lòng nhập số điện thoại" class="form-control" placeholder="0123456789">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Your Message') }} <span>*</span></label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Vui lòng nhập tin nhắn" placeholder="Tôi muốn tìm hiểu về dự án xxx..."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 text-center">
                                <button type="submit" class="default-btn btn-bg-two border-radius-50">
                                    {{ __('Send Message') }} <i class='bx bx-chevron-right'></i>
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
