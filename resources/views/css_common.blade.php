<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CssCommon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css_common.css').'?'.time() }}" media="all">
</head>

<body>
    <header>
        <a href="#" class="logo">My LOGO</a>
        <div class="menuToggle"></div>
        <nav>
            <ul>
                <li>
                    <a href="#"><i class="fa fa-solid fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-solid fa-utensils"></i> Ăn uống</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-brands fa-leanpub"></i> Học tập</a>
                    <!-- <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Dropdown</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul> -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-solid fa-tv"></i> Giải trí</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-solid fa-shopping-cart"></i> Mua sắm</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container-fluid box-container">
        <div class="box">
            <div class="thumb" style="background-image: url('https://randomwordgenerator.com/img/picture-generator/50e8d7454b53b10ff3d8992cc12c30771037dbf85254784a73287bd19f4f_640.jpg');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-utensils"></i>
                    <h3>Ăn uống</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb" style="background-image: url('https://randomwordgenerator.com/img/picture-generator/51e5d5454951b10ff3d8992cc12c30771037dbf85254794e702673d4934f_640.jpg');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-brands fa-leanpub"></i>
                    <h3>Học tập</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb" style="background-image: url('https://randomwordgenerator.com/img/picture-generator/55e6d1464955a514f1dc8460962e33791c3ad6e04e507440702d79d39e49c6_640.jpg');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-tv"></i>
                    <h3>Giải trí</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb" style="background-image: url('https://randomwordgenerator.com/img/picture-generator/55e0d2424954af14f1dc8460962e33791c3ad6e04e507440772d73d49745c0_640.jpg');"></div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-shopping-cart"></i>
                    <h3>Mua sắm</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container box-items">
        <div class="box-header">
            <i class="fa fa-solid fa-tv"></i>
            <h2>Giải trí</h2>
        </div>
        <div class="box-movies">
            <div class="card-movie">
                <div class="poster" onclick="return window.open('{{ route('home') }}', '_self');">
                    <img src="{{ asset('images/cala-learning-banner.jpg') }}" />
                </div>
                <div class="details">
                    <div class="tags">
                        <span>2020</span>
                        <span>United State</span>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>4/5</span>
                    </div>
                    <h3><a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum</a></h3>
                    <div class="info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam officia iusto quo tenetur iste eaque, odit officiis autem dicta aliquid repellendus doloribus sint ratione porro ipsum expedita.</p>
                    </div>
                </div>
            </div>
            <div class="card-movie">
                <div class="poster">
                    <img src="{{ asset('images/cala-learning-banner.jpg') }}" />
                </div>
                <div class="details">
                    <div class="tags">
                        <span>2020</span>
                        <span>United State</span>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>4/5</span>
                    </div>
                    <h3>Aaaaa</h3>
                    <div class="info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam officia iusto quo tenetur iste eaque, odit officiis autem dicta aliquid repellendus doloribus sint ratione porro ipsum expedita.</p>
                    </div>
                </div>
            </div>
            <div class="card-movie">
                <div class="poster">
                    <img src="{{ asset('images/cala-learning-banner.jpg') }}" />
                </div>
                <div class="details">
                    <div class="tags">
                        <span>2020</span>
                        <span>United State</span>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>4/5</span>
                    </div>
                    <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam off</h3>
                    <div class="info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam officia iusto quo tenetur iste eaque, odit officiis autem dicta aliquid repellendus doloribus sint ratione porro ipsum expedita.</p>
                    </div>
                </div>
            </div>
            <div class="card-movie">
                <div class="poster">
                    <img src="{{ asset('images/cala-learning-banner.jpg') }}" />
                </div>
                <div class="details">
                    <div class="tags">
                        <span>2020</span>
                        <span>United State</span>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>4/5</span>
                    </div>
                    <h3>Aaaaa</h3>
                    <div class="info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam officia iusto quo tenetur iste eaque, odit officiis autem dicta aliquid repellendus doloribus sint ratione porro ipsum expedita.</p>
                    </div>
                </div>
            </div>
            <div class="card-movie">
                <div class="poster">
                    <img src="{{ asset('images/cala-learning-banner.jpg') }}" />
                </div>
                <div class="details">
                    <div class="tags">
                        <span>2020</span>
                        <span>United State</span>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>4/5</span>
                    </div>
                    <h3>Aaaaa</h3>
                    <div class="info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam officia iusto quo tenetur iste eaque, odit officiis autem dicta aliquid repellendus doloribus sint ratione porro ipsum expedita.</p>
                    </div>
                </div>
            </div>
            <div class="card-movie">
                <div class="poster">
                    <img src="{{ asset('images/cala-learning-banner.jpg') }}" />
                </div>
                <div class="details">
                    <div class="tags">
                        <span>2020</span>
                        <span>United State</span>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <span>4/5</span>
                    </div>
                    <h3>Aaaaa</h3>
                    <div class="info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi dolorum cum laboriosam officia iusto quo tenetur iste eaque, odit officiis autem dicta aliquid repellendus doloribus sint ratione porro ipsum expedita.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let menuToggle = document.querySelector('.menuToggle');
        let header = document.querySelector('header');
        menuToggle.onclick = function() {
            header.classList.toggle('active');
        };
    </script>
</body>

</html>
