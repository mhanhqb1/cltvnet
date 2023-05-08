@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css"/>
<style>
    .related-movies {
        width: 100%;
    }
    .related-movies td {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed #ccc;
    }

    /* .related-movies td:first-child {
        padding-top: 0;
    } */

    .related-movies td .movie-image img {
        width: 100px;
        margin-right: 24px;
    }
    .paginate_button {
        margin: 0 5px;
    }
</style>
@endpush

<div class="inner-box category-content" style="padding-bottom: 15px;">
    <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
        <i class="fa fa-star"></i>
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;"> TE PUEDE GUSTAR</font>
        </font>
    </h2>
    <div class="faq-content">
        <table id="dataTable" class="data-table related-movies">
            <thead>
                <th></th>
            </thead>
            <tbody>
            @foreach($relatedMovies as $v)
            <tr>
                <td>
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
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" />
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "pageLength": 5,
            "searching": false,
            "bInfo": false,
            "bLengthChange": false,
        });
    });
</script>
@endpush
