<div class="inner-box category-content" style="padding-bottom: 15px;">
    <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
        <i class="fa fa-star"></i>
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> TE PUEDE GUSTAR</font>
        </font>
    </h2>
    <div class="faq-content">
        <ul class="related-movies">
            @foreach($relatedMovies as $v)
            <li>
                <div class="movie-image">
                    <a href="{{ route('home.movie_detail', $v->slug) }}" title="{{ $v->name }}">
                        <img src="{{ getImageUrl($v->image) }}" alt="{{ $v->name }}" />
                    </a>
                </div>
                <div class="movie-info">
                    <h4><a href="{{ route('home.movie_detail', $v->slug) }}">{{ $v->name }}</a></h4>
                    @if(!empty($v->cates) && !empty($v->country))
                    <p>
                        <a href="{{ route('home.country.index', $v->country->slug) }}" title="Novelas {{ $v->country->name }}">{{ $v->country->name }}</a>
                        @foreach($v->cates as $c)
                        - <a href="{{ route('home.cate.index', $c->slug) }}" title="{{ $c->name }}">{{ $c->name }}</a>
                        @endforeach
                    </p>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
