<?php
$cates = getFrontCategories();
?>
<div class="inner-box category-content" style="padding-bottom: 30px;">
    <h2 class="title-2" style="color:#cd1d1f; font-weight:bold;">
        <i class="fa fa-television"></i>
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">CATEGORÍAS</font>
        </font>
    </h2>
    <p style="font-size:15px;">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Selecciona tu categoría.</font>
        </font>
    </p>
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal">
                <fieldset>
                    <table style="width:100%;">
                        <tbody>
                            @foreach($cates as $cate)
                            <tr>
                                <td style="border-bottom:1px solid #ccc; padding:5px; width:100%;">
                                    <a href="{{ route('home.cate.index', $cate->slug) }}">
                                        <b>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $cate->name }}</font>
                                            </font>
                                        </b>
                                        <img src="{{ asset('/images/arrow.png') }}" style="float:right; max-width:20px;">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </fieldset>
            </form>
        </div>
    </div>
</div>
