<div class="single-video">
    <div class="video-img">
        <a href="single-video.html">
            <img class="lazy" data-src="{{ $item->image }}" alt="Video" />
            <noscript>
                <img src="{{ $item->image }}" alt="video" />
            </noscript>
        </a>
        <span class="video-duration">5.28</span>
    </div>
    <div class="video-content">
        <h4><a href="single-video.html" class="video-title">{{ $item->name }}</a></h4>
        <div class="video-counter">
            <div class="video-viewers">
                <span class="fa fa-eye view-icon"></span>
                <span>241,021</span>
            </div>
            <div class="video-feedback">
                <div class="video-like-counter">
                    <span class="far fa-thumbs-up like-icon"></span>
                    <span>2140</span>
                </div>
                <!-- <div class="video-like-counter">
                    <span class="far fa-thumbs-down dislike-icon"></span>
                    <span>2140</span>
                </div> -->
            </div>
        </div>
    </div>
</div>
