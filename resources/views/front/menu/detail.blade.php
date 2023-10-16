@extends('layouts.front-master')

@section('content')
<div class="container">
    <section class="tstbite-components my-4 my-md-5">
        <div class="d-sm-flex">
            <div class="tstbite-svg order-sm-2 ml-auto">
                <div class="tstbite-feature pt-0">
                    <a href="#0">
                        <svg data-name="feather-icon/share" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <rect data-name="Bounding Box" width="32" height="32" fill="rgba(255,255,255,0)"></rect>
                            <path d="M4,29.333a4,4,0,0,1-4-4V14.666a1.333,1.333,0,1,1,2.666,0V25.333A1.333,1.333,0,0,0,4,26.666H20a1.333,1.333,0,0,0,1.333-1.333V14.666a1.333,1.333,0,1,1,2.666,0V25.333a4,4,0,0,1-4,4Zm6.667-10.666V4.552L7.609,7.609A1.333,1.333,0,0,1,5.724,5.724L11.057.39a1.333,1.333,0,0,1,.307-.229h0l.025-.013.008,0,.018-.009.015-.007.011-.005.024-.011h0a1.338,1.338,0,0,1,1.062,0h0l.024.011.011,0,.016.008L12.6.143l.008,0,.025.013h0a1.333,1.333,0,0,1,.307.229l5.333,5.334a1.333,1.333,0,1,1-1.885,1.885L13.333,4.552V18.667a1.333,1.333,0,0,1-2.666,0Z" transform="translate(4 1.333)"></path>
                        </svg>
                    </a>
                    <a href="#0">
                        <svg data-name="feather-icon/share copy" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                            <rect data-name="Bounding Box" width="32" height="32" fill="rgba(255,255,255,0)"></rect>
                            <path d="M20,26.669a1.318,1.318,0,0,1-.77-.251l-8.558-6.113L2.108,26.418a1.319,1.319,0,0,1-.77.251A1.362,1.362,0,0,1,.41,26.3,1.314,1.314,0,0,1,0,25.333V4A4,4,0,0,1,4,0H17.333a4,4,0,0,1,4,4V25.333A1.34,1.34,0,0,1,20,26.669Zm-9.329-9.336a1.329,1.329,0,0,1,.776.248l7.225,5.161V4a1.335,1.335,0,0,0-1.334-1.333H4A1.335,1.335,0,0,0,2.666,4V22.742l7.225-5.161A1.324,1.324,0,0,1,10.666,17.333Z" transform="translate(5.333 2.667)"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div>
                <strong>
                    <svg data-name="feather-icon/trending-up" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                        <rect data-name="Bounding Box" width="20" height="20" fill="rgba(255,255,255,0)"></rect>
                        <path d="M.244,11.423a.834.834,0,0,1,0-1.178L6.494,3.994a.834.834,0,0,1,1.178,0L11.25,7.571l5.9-5.9H14.167a.833.833,0,1,1,0-1.667h5A.833.833,0,0,1,20,.833v5a.834.834,0,0,1-1.667,0V2.845L11.839,9.339a.834.834,0,0,1-1.179,0L7.083,5.761l-5.66,5.661a.834.834,0,0,1-1.179,0Z" transform="translate(0 4.167)" fill="#ff642f"></path>
                    </svg>
                    <span class="ml-2 caption font-weight-medium">85% would make this again</span>
                </strong>
                <h5 class="py-3 mb-0 h2">{{ $menu->name }}</h5>
            </div>
        </div>
        <div class="d-flex flex-wrap">
            <div class="my-2 mr-4">
                <img src="{{ asset('images/avatar1.png') }}" class="rounded-circle" alt="Avatar">
                <small class="pl-1">Admin</small>
            </div>
            <div class="my-2 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="13.333" height="14.666" viewBox="0 0 13.333 14.666">
                    <path d="M2,14.666a2,2,0,0,1-2-2V3.333a2,2,0,0,1,2-2H3.334V.667a.667.667,0,0,1,1.333,0v.667h4V.667A.667.667,0,0,1,10,.667v.667h1.333a2,2,0,0,1,2,2v9.334a2,2,0,0,1-2,2Zm-.667-2A.667.667,0,0,0,2,13.333h9.334A.667.667,0,0,0,12,12.667v-6H1.333ZM12,5.333v-2a.667.667,0,0,0-.667-.667H10v.667a.667.667,0,0,1-1.334,0V2.666h-4v.667a.667.667,0,1,1-1.333,0V2.666H2a.667.667,0,0,0-.667.667v2Z"></path>
                </svg>
                <small>{{ date('Y-m-d', strtotime($menu->updated_at)) }}</small>
            </div>
            <div class="my-2 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="17.333" height="14.666" viewBox="0 0 23.999 18">
                    <path d="M3.146,13.684A20.544,20.544,0,0,1,.895,10.793l-.238-.378C.482,10.133.33,9.872.218,9.661L.105,9.447a1.008,1.008,0,0,1,0-.895l.113-.214c.112-.211.265-.472.438-.753l.238-.378A20.544,20.544,0,0,1,3.146,4.316C5.83,1.453,8.809,0,12,0s6.17,1.453,8.855,4.316a20.545,20.545,0,0,1,2.251,2.891l.238.378c.167.27.318.53.438.753l.112.214a1,1,0,0,1,0,.895l-.112.214c-.121.223-.272.483-.438.753l-.238.378a20.545,20.545,0,0,1-2.251,2.891C18.169,16.547,15.19,18,12,18S5.83,16.547,3.146,13.684Zm1.459-8a18.534,18.534,0,0,0-2.03,2.609c-.163.253-.309.491-.433.707.122.213.268.452.433.707A18.534,18.534,0,0,0,4.6,12.317C6.9,14.761,9.385,16,12,16s5.1-1.239,7.4-3.684a18.433,18.433,0,0,0,2.029-2.609c.105-.163.207-.325.3-.483L21.859,9l-.132-.224-.2-.318-.106-.166A18.433,18.433,0,0,0,19.4,5.684C17.1,3.239,14.615,2,12,2S6.9,3.239,4.6,5.684ZM8,9a4,4,0,1,1,4,4A4,4,0,0,1,8,9Zm2,0a2,2,0,1,0,2-2A2,2,0,0,0,10,9Z" transform="translate(-0.001)"></path>
                </svg>
                <small>{{ $menu->total_view }}</small>
            </div>
            <div class="my-2">
                <div class="w-100 float-left">
                    <div class="float-left">
                        <div class="fabrx-ratings has-rating rating">
                            <input type="radio" id="radio1" name="rate1" value="1" checked="checked">
                            <label for="radio1" class="custom-starboxes"></label>
                            <input type="radio" id="radio2" name="rate1" value="2">
                            <label for="radio2" class="custom-starboxes"></label>
                            <input type="radio" id="radio3" name="rate1" value="3">
                            <label for="radio3" class="custom-starboxes"></label>
                            <input type="radio" id="radio4" name="rate1" value="4">
                            <label for="radio4" class="custom-starboxes"></label>
                            <input type="radio" id="radio5" name="rate1" value="5">
                            <label for="radio5" class="custom-starboxes"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-detail">
            <hr>
            <p>{{ $menu->description }}</p>
            <br>
            <div class="rounded-12 overflow-hidden position-relative tstbite-svg">
                <img src="{{ $menu->image }}" class="w-100" alt="Menu">
                <!-- <div class="overlay-box">
                    <a href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="85.334" height="106.685" viewBox="0 0 85.334 106.685">
                            <path d="M5.347,106.685a5.436,5.436,0,0,1-3.715-1.5A5.261,5.261,0,0,1,0,101.343v-96A5.324,5.324,0,0,1,8.218.855l74.669,48a5.338,5.338,0,0,1,0,8.976l-74.669,48A5.311,5.311,0,0,1,5.347,106.685Zm5.318-91.575V91.575L70.138,53.343Z" fill="#fff"></path>
                        </svg>
                    </a>
                </div> -->
            </div>
            <br>
            <div class="row mt-0 mt-md-5">
                <div class="col-md-12">
                    <h6>Danh sách món ăn</h6>
                    <div class="row">
                        @foreach($menu->foods as $food)
                            <div class="col-md-12 col-6">
                                @include('front.menu.elements.menu-food-item', ['food' => $food])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tstbite-components my-4 my-md-5">
        <h5 class="py-3 mb-0">Có thể bạn sẽ thích</h5>
        <div class="row">
            @foreach($otherMenus as $menu)
            <div class="col-lg-3 col-md-4 col-6">
                @include('front.menu.elements.menu-item', ['menu' => $menu])
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
