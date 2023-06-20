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
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Dropdown <b>+</b></a>
                    <ul>
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
                    </ul>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="container box-container">
        <div class="box">
            <div class="thumb">
                <img src="https://randomwordgenerator.com/img/picture-generator/50e8d7454b53b10ff3d8992cc12c30771037dbf85254784a73287bd19f4f_640.jpg"/>
            </div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-utensils"></i>
                    <h3>CaLa Food</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb">
                <img src="https://randomwordgenerator.com/img/picture-generator/51e5d5454951b10ff3d8992cc12c30771037dbf85254794e702673d4934f_640.jpg"/>
            </div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-brands fa-leanpub"></i>
                    <h3>CaLa Learning</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb">
                <img src="https://randomwordgenerator.com/img/picture-generator/55e6d1464955a514f1dc8460962e33791c3ad6e04e507440702d79d39e49c6_640.jpg"/>
            </div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-tv"></i>
                    <h3>CaLa Entertainment</h3>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="thumb">
                <img src="https://randomwordgenerator.com/img/picture-generator/55e0d2424954af14f1dc8460962e33791c3ad6e04e507440772d73d49745c0_640.jpg"/>
            </div>
            <div class="details">
                <div class="content">
                    <i class="fa fa-solid fa-newspaper"></i>
                    <h3>CaLa News</h3>
                    <a href="#">Read more</a>
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
