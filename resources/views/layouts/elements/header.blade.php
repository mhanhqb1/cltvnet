<?php

use App\Common\Definition\CateType;

$cates = getFrontCates();
$menuCates = $cates[CateType::Menu->value];
$foodCates = $cates[CateType::Food->value];
$ingredientCates = $cates[CateType::Ingredient->value];
$baseUrl = route('front.home');
?>
<section class="tstbite-section p-0">
    <div class="container">
        <header class="tstbite-header bg-white">
            <nav class="navbar navbar-expand-lg has-header-inner px-0">
                <a class="navbar-brand" href="{{ $baseUrl }}">
                    <h1 style="font-size: 1.5em;">CaLaFood</h1>
                </a>
                <div class="tstbite-header-links d-flex align-items-center ml-auto order-0 order-lg-2">
                    <a href="javascript:void(0)" class="search-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26.667" height="26.667" viewBox="0 0 26.667 26.667">
                            <path d="M24.39,26.276l-4.9-4.9a12.012,12.012,0,1,1,1.885-1.885l4.9,4.9a1.334,1.334,0,0,1-1.886,1.886ZM2.666,12a9.329,9.329,0,0,0,15.827,6.7,1.338,1.338,0,0,1,.206-.206A9.332,9.332,0,1,0,2.666,12Z" />
                        </svg>
                    </a>
                    <a href="#0" class="ml-4 ml-md-4 mr-2 mr-md-0 circle"><img src="{{ asset('images/avatar1.png') }}" alt="Avatar"></a>
                </div>
                <button class="navbar-toggler pr-0 ml-2 ml-md-3" type="button" data-toggle="collapse" data-target="#menu-4" aria-controls="menu-4" aria-expanded="false" aria-label="Toggle navigation">
                    <svg data-name="Icon/Hamburger" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path data-name="Icon Color" d="M1.033,14a1.2,1.2,0,0,1-.409-.069.947.947,0,0,1-.337-.207,1.2,1.2,0,0,1-.216-.333,1.046,1.046,0,0,1-.072-.4A1.072,1.072,0,0,1,.072,12.6a.892.892,0,0,1,.216-.321.947.947,0,0,1,.337-.207A1.2,1.2,0,0,1,1.033,12H22.967a1.206,1.206,0,0,1,.409.069.935.935,0,0,1,.336.207.9.9,0,0,1,.217.321,1.072,1.072,0,0,1,.072.391,1.046,1.046,0,0,1-.072.4,1.206,1.206,0,0,1-.217.333.935.935,0,0,1-.336.207,1.206,1.206,0,0,1-.409.069Zm0-6a1.2,1.2,0,0,1-.409-.069.934.934,0,0,1-.337-.207,1.189,1.189,0,0,1-.216-.333A1.046,1.046,0,0,1,0,6.989,1.068,1.068,0,0,1,.072,6.6a.9.9,0,0,1,.216-.322.947.947,0,0,1,.337-.207A1.2,1.2,0,0,1,1.033,6H22.967a1.206,1.206,0,0,1,.409.068.935.935,0,0,1,.336.207.9.9,0,0,1,.217.322A1.068,1.068,0,0,1,24,6.989a1.046,1.046,0,0,1-.072.4,1.193,1.193,0,0,1-.217.333.923.923,0,0,1-.336.207A1.206,1.206,0,0,1,22.967,8Zm0-6a1.2,1.2,0,0,1-.409-.068.947.947,0,0,1-.337-.207,1.193,1.193,0,0,1-.216-.334A1.039,1.039,0,0,1,0,.988,1.068,1.068,0,0,1,.072.6.892.892,0,0,1,.288.276.934.934,0,0,1,.625.069,1.2,1.2,0,0,1,1.033,0H22.967a1.206,1.206,0,0,1,.409.069.923.923,0,0,1,.336.207A.9.9,0,0,1,23.928.6,1.068,1.068,0,0,1,24,.988a1.039,1.039,0,0,1-.072.4,1.2,1.2,0,0,1-.217.334.935.935,0,0,1-.336.207A1.206,1.206,0,0,1,22.967,2Z" transform="translate(0 5)" fill="#000"></path>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="menu-4">
                    <ul class="navbar-nav m-auto pt-3 pt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ $baseUrl }}" role="button" id="HomePage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" id="menuCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Danh mục</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.333" height="5.333" viewBox="0 0 9.333 5.333">
                                    <path d="M1.138.2A.667.667,0,0,0,.2,1.138l4,4a.667.667,0,0,0,.943,0l4-4A.667.667,0,1,0,8.2.2L4.667,3.724Z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuCategory">
                                @foreach ($mealTypes as $type => $mealType)
                                <a class="dropdown-item" href="{{ route('front.foods.mealtype', $mealType['slug']) }}">{{ $mealType['title'] }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" id="RecipePage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Thực đơn</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.333" height="5.333" viewBox="0 0 9.333 5.333">
                                    <path d="M1.138.2A.667.667,0,0,0,.2,1.138l4,4a.667.667,0,0,0,.943,0l4-4A.667.667,0,1,0,8.2.2L4.667,3.724Z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="RecipePage">
                                @foreach($menuCates as $cate)
                                <a class="dropdown-item" href="{{ route('front.menu.cate', $cate->slug) }}">{{ $cate->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" id="RecipePage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Món ăn</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.333" height="5.333" viewBox="0 0 9.333 5.333">
                                    <path d="M1.138.2A.667.667,0,0,0,.2,1.138l4,4a.667.667,0,0,0,.943,0l4-4A.667.667,0,1,0,8.2.2L4.667,3.724Z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="RecipePage">
                                @foreach($foodCates as $cate)
                                <a class="dropdown-item" href="{{ route('front.foods.cate', $cate->slug) }}">{{ $cate->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" id="RecipePage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Nguyên liệu</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.333" height="5.333" viewBox="0 0 9.333 5.333">
                                    <path d="M1.138.2A.667.667,0,0,0,.2,1.138l4,4a.667.667,0,0,0,.943,0l4-4A.667.667,0,1,0,8.2.2L4.667,3.724Z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="RecipePage">
                                @foreach($ingredientCates as $cate)
                                <a class="dropdown-item" href="{{ route('front.ingredients.detail', $cate->slug) }}">{{ $cate->name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" id="RecipePage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span>Dinh dưỡng</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.333" height="5.333" viewBox="0 0 9.333 5.333">
                                    <path d="M1.138.2A.667.667,0,0,0,.2,1.138l4,4a.667.667,0,0,0,.943,0l4-4A.667.667,0,1,0,8.2.2L4.667,3.724Z" />
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="RecipePage">
                                <a class="dropdown-item" href="recipe-full-width.html">Full Width</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>

        <div class="tstbite-search">
            <div class="container">
                <div class="input-group search-box">
                    <input type="text" name="Search" placeholder="Search" class="form-control" id="Search">
                    <button type="button"><img src="{{ asset('images/close.svg') }}" alt="img"></button>
                </div>
                <div class="search-results" id="SearchList">
                    <div class="tstbite-search-list">
                        <a href="#0">
                            <figure><img src="{{ asset('images/menu1.jpg') }}" class="rounded-circle" alt="Menu"></figure>
                            <div class="tstbite-search-name">
                                <strong class="small">Cake</strong>
                                <span class="tiny">Category</span>
                            </div>
                        </a>
                    </div>
                    <div class="text-center py-4">
                        <a href="#0" class="btn btn-sm btn-outline-dark px-4 py-2">See all 343 results</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
