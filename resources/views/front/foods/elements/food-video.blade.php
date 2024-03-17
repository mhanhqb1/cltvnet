<figure class="my-3 tstbite-card border rounded-6 overflow-hidden">
    <div class="overflow-hidden position-relative tstbite-svg card-image">
        <img src="{{ $food->image }}" class="w-100" alt="Menu">
        <div class="overlay-box">
            <a href="javascript:void(0);">
                <svg xmlns="http://www.w3.org/2000/svg" width="85.334" height="106.685" viewBox="0 0 85.334 106.685">
                    <path d="M5.347,106.685a5.436,5.436,0,0,1-3.715-1.5A5.261,5.261,0,0,1,0,101.343v-96A5.324,5.324,0,0,1,8.218.855l74.669,48a5.338,5.338,0,0,1,0,8.976l-74.669,48A5.311,5.311,0,0,1,5.347,106.685Zm5.318-91.575V91.575L70.138,53.343Z" fill="#fff"></path>
                </svg>
            </a>
        </div>
    </div>
    <figcaption class="tstbite-delicious border-0">
        <div class="text-black pt-3 pb-4 px-4">
            <div class="w-100 float-left">
                <div class="float-left">
                    <div class="fabrx-ratings has-rating rating">
                        <input type="radio" id="radio1-{{ $video->food_video_id }}" name="rate1-{{ $video->food_video_id }}" value="1" checked="checked">
                        <label for="radio1-{{ $video->food_video_id }}" class="custom-starboxes"></label>
                        <input type="radio" id="radio2-{{ $video->food_video_id }}" name="rate1-{{ $video->food_video_id }}" value="2">
                        <label for="radio2-{{ $video->food_video_id }}" class="custom-starboxes"></label>
                        <input type="radio" id="radio3-{{ $video->food_video_id }}" name="rate1-{{ $video->food_video_id }}" value="3">
                        <label for="radio3-{{ $video->food_video_id }}" class="custom-starboxes"></label>
                        <input type="radio" id="radio4-{{ $video->food_video_id }}" name="rate1-{{ $video->food_video_id }}" value="4">
                        <label for="radio4-{{ $video->food_video_id }}" class="custom-starboxes"></label>
                        <input type="radio" id="radio5-{{ $video->food_video_id }}" name="rate1-{{ $video->food_video_id }}" value="5">
                        <label for="radio5-{{ $video->food_video_id }}" class="custom-starboxes"></label>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <h6 class="inter-font f-size-20 mb-0 font-weight-semibold">
                <a href="#" class="text-black">{{ $video->video_name }}</a>
            </h6>
            <div class="d-flex flex-wrap justify-content-end mt-4">
                <div class="text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13.333" height="14.666" viewBox="0 0 13.333 14.666">
                        <path d="M2,14.666a2,2,0,0,1-2-2V3.333a2,2,0,0,1,2-2H3.334V.667a.667.667,0,0,1,1.333,0v.667h4V.667A.667.667,0,0,1,10,.667v.667h1.333a2,2,0,0,1,2,2v9.334a2,2,0,0,1-2,2Zm-.667-2A.667.667,0,0,0,2,13.333h9.334A.667.667,0,0,0,12,12.667v-6H1.333ZM12,5.333v-2a.667.667,0,0,0-.667-.667H10v.667a.667.667,0,0,1-1.334,0V2.666h-4v.667a.667.667,0,1,1-1.333,0V2.666H2a.667.667,0,0,0-.667.667v2Z"></path>
                    </svg>
                    <small>{{ date('Y-m-d', strtotime($video->updated_at)) }}</small>
                </div>
                <div class="ml-4 text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.333" height="14.666" viewBox="0 0 23.999 18">
                        <path d="M3.146,13.684A20.544,20.544,0,0,1,.895,10.793l-.238-.378C.482,10.133.33,9.872.218,9.661L.105,9.447a1.008,1.008,0,0,1,0-.895l.113-.214c.112-.211.265-.472.438-.753l.238-.378A20.544,20.544,0,0,1,3.146,4.316C5.83,1.453,8.809,0,12,0s6.17,1.453,8.855,4.316a20.545,20.545,0,0,1,2.251,2.891l.238.378c.167.27.318.53.438.753l.112.214a1,1,0,0,1,0,.895l-.112.214c-.121.223-.272.483-.438.753l-.238.378a20.545,20.545,0,0,1-2.251,2.891C18.169,16.547,15.19,18,12,18S5.83,16.547,3.146,13.684Zm1.459-8a18.534,18.534,0,0,0-2.03,2.609c-.163.253-.309.491-.433.707.122.213.268.452.433.707A18.534,18.534,0,0,0,4.6,12.317C6.9,14.761,9.385,16,12,16s5.1-1.239,7.4-3.684a18.433,18.433,0,0,0,2.029-2.609c.105-.163.207-.325.3-.483L21.859,9l-.132-.224-.2-.318-.106-.166A18.433,18.433,0,0,0,19.4,5.684C17.1,3.239,14.615,2,12,2S6.9,3.239,4.6,5.684ZM8,9a4,4,0,1,1,4,4A4,4,0,0,1,8,9Zm2,0a2,2,0,1,0,2-2A2,2,0,0,0,10,9Z" transform="translate(-0.001)"></path>
                    </svg>
                    <small>{{ $food->total_view }}</small>
                </div>
            </div>
        </div>
    </figcaption>
</figure>