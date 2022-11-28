@extends('layouts.master')

@section('content')
<header class="top-header top-header-bg">
    <div class="container-fluid">
        <div class="container-max">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="top-head-left">
                        <div class="top-contact">
                            <h3>Support By : <a href="tel:+1(212)-255-5511">+1 (212) 255-5511</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="top-header-right">
                        <div class="top-header-social">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/?lang=en" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class='bx bxl-linkedin-square'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="language-list">
                            <select class="language-list-item">
                                <option>English</option>
                                <option>العربيّة</option>
                                <option>Deutsch</option>
                                <option>Português</option>
                                <option>简体中文</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="navbar-area">

    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="images/logos/logo-1.png" class="logo-one" alt="Logo">
            <img src="images/logos/logo-2.png" class="logo-two" alt="Logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container-fluid">
            <div class="container-max">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logos/logo-1.png" class="logo-one" alt="Logo">
                        <img src="images/logos/logo-2.png" class="logo-two" alt="Logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Home
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="index.html" class="nav-link">
                                            Home One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-2.html" class="nav-link">
                                            Home Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-3.html" class="nav-link active">
                                            Home Three
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-4.html" class="nav-link">
                                            Home Four <span>(New)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-5.html" class="nav-link">
                                            Home Five <span>(New)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-6.html" class="nav-link">
                                            Home Six <span>(New)</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Pages
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">
                                            Team
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="testimonials.html" class="nav-link">
                                            Testimonials
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            FAQ
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Case Study
                                            <i class='bx bx-caret-down'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="case-study.html" class="nav-link">
                                                    Case Study
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="case-details.html" class="nav-link">
                                                    Case Study Details
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            User
                                            <i class='bx bx-caret-down'></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="log-in.html" class="nav-link">
                                                    Log In
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="register.html" class="nav-link">
                                                    Registration
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="forget-password.html" class="nav-link">
                                                    Forget Password
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="terms-condition.html" class="nav-link">
                                            Terms & Conditions
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="404.html" class="nav-link">
                                            404 page
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="coming-soon.html" class="nav-link">
                                            Coming Soon
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Services
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="services-1.html" class="nav-link">
                                            Services Style One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="services-2.html" class="nav-link">
                                            Services Style Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="service-details.html" class="nav-link">
                                            Service Details
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Blog
                                    <i class='bx bx-caret-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="blog-1.html" class="nav-link">
                                            Blog Style One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-2.html" class="nav-link">
                                            Blog Style Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-details.html" class="nav-link">
                                            Blog Details
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">
                                    Contact
                                </a>
                            </li>
                        </ul>
                        <div class="nav-side d-display nav-side-mt">
                            <div class="nav-side-item">
                                <div class="search-side-widget">
                                    <form class="search-side-form">
                                        <input type="search" class="form-control" placeholder="Search...">
                                        <button type="submit">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="nav-side-item">
                                <div class="get-btn">
                                    <a href="contact.html" class="default-btn btn-bg-two border-radius-50">Get A Quote <i class='bx bx-chevron-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="side-nav-responsive">
        <div class="container-max">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="in-circle circle-one"></div>
                    <div class="in-circle circle-two"></div>
                    <div class="in-circle circle-three"></div>
                </div>
            </div>
            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-nav-item nav-side">
                            <div class="search-box">
                                <i class='bx bx-search'></i>
                            </div>
                            <div class="get-btn">
                                <a href="contact.html" class="default-btn btn-bg-two border-radius-50">Get A Quote <i class='bx bx-chevron-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-layer"></div>
            <div class="search-layer"></div>
            <div class="search-layer"></div>
            <div class="search-close">
                <span class="search-close-line"></span>
                <span class="search-close-line"></span>
            </div>
            <div class="search-form">
                <form>
                    <input type="text" class="input-search" placeholder="Search here...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="banner-area-two">
    <div class="container-fluid">
        <div class="container-max">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="banner-content">
                        <h1>Digital IT Service With Excellent Quality</h1>
                        <p>
                            Aenean Sollicitudin, Lorem quis Bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                        </p>
                        <div class="banner-btn">
                            <a href="about.html" class="default-btn btn-bg-two border-radius-50">Learn More <i class='bx bx-chevron-right'></i></a>
                            <a href="contact.html" class="default-btn btn-bg-one border-radius-50 ml-20">Get A Quote <i class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner-img">
                        <img src="images/home-three/home-three-img.png" alt="Images">
                        <div class="banner-img-shape">
                            <img src="images/home-three/home-three-shape.png" alt="Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="banner-sub-slider owl-carousel owl-theme">
            <div class="banner-sub-item">
                <img src="images/home-three/home-three-sub1.jpg" alt="Images">
                <div class="content">
                    <h3>3.7k</h3>
                    <span>Satisfied Clients</span>
                </div>
            </div>
            <div class="banner-sub-item">
                <img src="images/home-three/home-three-sub2.jpg" alt="Images">
                <div class="content">
                    <h3>45+</h3>
                    <span>Country Worldwide</span>
                </div>
            </div>
            <div class="banner-sub-item">
                <img src="images/home-three/home-three-sub3.jpg" alt="Images">
                <div class="content">
                    <h3>6.5+</h3>
                    <span>Project Completed</span>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-area about-bg pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-2">
                    <img src="images/about/about-img3.jpg" alt="About Images">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-2 ml-20">
                    <div class="section-title">
                        <span class="sp-color1">About Us</span>
                        <h2>Right Partner for Software Innovation</h2>
                        <p>
                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.
                            Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum auctor a ornare odio.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <div class="about-card">
                                <div class="content">
                                    <i class="flaticon-practice"></i>
                                    <h3>Experience</h3>
                                </div>
                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="about-card">
                                <div class="content">
                                    <i class="flaticon-help"></i>
                                    <h3>Quick Support</h3>
                                </div>
                                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="security-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">IT Security & Computing</span>
            <h2>Searching for a Solution! We Provide Truly Prominent IT Solutions</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="flaticon-cyber-security"></i>
                    <h3><a href="case-details.html">Business Security</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit scelerisque ullamcorper proin scelerisque tortor odio.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="flaticon-computer"></i>
                    <h3><a href="case-details.html">Manage IT Service</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit scelerisque ullamcorper proin scelerisque tortor odio.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="flaticon-effective"></i>
                    <h3><a href="case-details.html">Product Analysis</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit scelerisque ullamcorper proin scelerisque tortor odio.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="flaticon-implement"></i>
                    <h3><a href="case-details.html">Analytic Solution</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit scelerisque ullamcorper proin scelerisque tortor odio.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="flaticon-consulting"></i>
                    <h3><a href="case-details.html">Finest Quality</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit scelerisque ullamcorper proin scelerisque tortor odio.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="security-card">
                    <i class="flaticon-consultant"></i>
                    <h3><a href="case-details.html">Risk Management</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam blandit scelerisque ullamcorper proin scelerisque tortor odio.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="services-area-three pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Our Services</span>
            <h2>We Provide a Wide Variety of IT Services</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="service-details.html">
                        <img src="images/services/services-img1.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <i class="flaticon-consultant"></i>
                        <span><a href="service-details.html">IT Solution</a></span>
                        <h3><a href="service-details.html">IT Consulting</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="service-details.html">
                        <img src="images/services/services-img2.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <i class="flaticon-consulting"></i>
                        <span><a href="service-details.html">Cloud Services</a></span>
                        <h3><a href="service-details.html">Cloud Computing</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="service-details.html">
                        <img src="images/services/services-img3.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <i class="flaticon-web-development"></i>
                        <span><a href="service-details.html">Web Services</a></span>
                        <h3><a href="service-details.html">Web Development</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="service-details.html">
                        <img src="images/services/services-img4.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <i class="flaticon-stats"></i>
                        <span><a href="service-details.html">Business</a></span>
                        <h3><a href="service-details.html">Business Reform</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="service-details.html">
                        <img src="images/services/services-img5.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <i class="flaticon-structure"></i>
                        <span><a href="service-details.html">Planing</a></span>
                        <h3><a href="service-details.html">Infrastructure</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="services-item">
                    <a href="service-details.html">
                        <img src="images/services/services-img6.jpg" alt="Images">
                    </a>
                    <div class="content">
                        <i class="flaticon-data-analytics"></i>
                        <span><a href="service-details.html">Analysis</a></span>
                        <h3><a href="service-details.html">Data Analysis</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="build-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-8">
                <div class="build-content">
                    <div class="section-title">
                        <span>We Carry More Than Just Good Coding Skills</span>
                        <h2>Let's Build Your Website!</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="build-btn-area">
                    <a href="contact.html" class="default-btn btn-bg-two border-radius-50">Contact Us <i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
        </div>
        <div class="row pt-45">
            <div class="col-lg-12">
                <div class="play-btn-area">
                    <a href="https://www.youtube.com/watch?v=tUP5S4YdEJo" class="build-play popup-btn"><i class='bx bx-play'></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="case-study-area pb-70">
    <div class="container-fluid p-0">
        <div class="section-title text-center">
            <span class="sp-color2">Case Study</span>
            <h2>Introduce Our Projects and Check Recent Work </h2>
        </div>
        <div class="case-study-slider owl-carousel owl-theme pt-45">
            <div class="case-study-item">
                <a href="case-details.html">
                    <img src="images/case-study/case-study1.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="case-details.html">Business Solution</a></h3>
                    <ul>
                        <li><a href="case-details.html">Business</a></li>
                        <li><a href="case-details.html">Planing</a> </li>
                    </ul>
                    <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
            <div class="case-study-item">
                <a href="case-details.html">
                    <img src="images/case-study/case-study2.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="case-details.html">Business Solution</a></h3>
                    <ul>
                        <li><a href="case-details.html">Business</a></li>
                        <li><a href="case-details.html">Planing</a> </li>
                    </ul>
                    <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
            <div class="case-study-item">
                <a href="case-details.html">
                    <img src="images/case-study/case-study3.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="case-details.html">Business Solution</a></h3>
                    <ul>
                        <li><a href="case-details.html">Business</a></li>
                        <li><a href="case-details.html">Planing</a> </li>
                    </ul>
                    <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
            <div class="case-study-item">
                <a href="case-details.html">
                    <img src="images/case-study/case-study4.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="case-details.html">UI/UX Research</a></h3>
                    <ul>
                        <li><a href="case-details.html">UI/UX Design</a></li>
                        <li><a href="case-details.html">Research</a> </li>
                    </ul>
                    <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
            <div class="case-study-item">
                <a href="case-details.html">
                    <img src="images/case-study/case-study6.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="case-details.html">Business Solution</a></h3>
                    <ul>
                        <li><a href="case-details.html">Solution</a></li>
                        <li><a href="case-details.html">Business</a> </li>
                    </ul>
                    <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
            <div class="case-study-item">
                <a href="case-details.html">
                    <img src="images/case-study/case-study2.jpg" alt="Images">
                </a>
                <div class="content">
                    <h3><a href="case-details.html">Web Development</a></h3>
                    <ul>
                        <li><a href="case-details.html">Design</a></li>
                        <li><a href="case-details.html">Development</a> </li>
                    </ul>
                    <a href="case-details.html" class="more-btn"><i class='bx bx-right-arrow-alt'></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="talk-area ptb-100">
    <div class="container">
        <div class="talk-content text-center">
            <div class="section-title text-center">
                <span class="sp-color1">Let's Talk</span>
                <h2>We Are Adding Kinds of It Services That You Grow Success</h2>
            </div>
            <a href="contact.html" class="default-btn btn-bg-two border-radius-5">Contact Us</a>
        </div>
    </div>
</div>


<section class="technology-area-two pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Technology Index</span>
            <h2>We Deliver Our Best Solution With The Goal of Trusting</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-android"></i>
                    <h3>Android</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-website"></i>
                    <h3>Web</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-apple"></i>
                    <h3>ios</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-television"></i>
                    <h3>TV</h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-smartwatch"></i>
                    <h3>Watch </h3>
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <div class="technology-card technology-card-color">
                    <i class="flaticon-cyber-security"></i>
                    <h3>IOT</h3>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="brand-area-two ptb-100">
    <div class="container">
        <div class="brand-slider owl-carousel owl-theme">
            <div class="brand-item">
                <img src="images/brand-logo/brand-style1.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="images/brand-logo/brand-style2.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="images/brand-logo/brand-style3.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="images/brand-logo/brand-style4.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="images/brand-logo/brand-style5.png" alt="Images">
            </div>
            <div class="brand-item">
                <img src="images/brand-logo/brand-style3.png" alt="Images">
            </div>
        </div>
    </div>
</div>


<section class="clients-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Our Clients</span>
            <h2>Our Clients Feedback</h2>
        </div>
        <div class="clients-slider owl-carousel owl-theme pt-45">
            <div class="clients-content">
                <div class="content">
                    <img src="images/clients-img/clients-img1.jpg" alt="Images">
                    <i class='bx bxs-quote-alt-left'></i>
                    <h3>Jonthon Martin</h3>
                    <span>App Developer</span>
                </div>
                <p>
                    “Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.
                    sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi loren accumsan ipsum velit.”
                </p>
            </div>
            <div class="clients-content">
                <div class="content">
                    <img src="images/clients-img/clients-img2.jpg" alt="Images">
                    <i class='bx bxs-quote-alt-left'></i>
                    <h3>Alin Decros</h3>
                    <span>Graphic Designer</span>
                </div>
                <p>
                    “Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.
                    sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi loren accumsan ipsum velit.”
                </p>
            </div>
            <div class="clients-content">
                <div class="content">
                    <img src="images/clients-img/clients-img3.jpg" alt="Images">
                    <i class='bx bxs-quote-alt-left'></i>
                    <h3>Elen Musk</h3>
                    <span>Web Developer</span>
                </div>
                <p>
                    “Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.
                    sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi loren accumsan ipsum velit.”
                </p>
            </div>
        </div>
    </div>
    <div class="client-circle">
        <div class="client-circle-1">
            <div class="circle"></div>
        </div>
        <div class="client-circle-2">
            <div class="circle"></div>
        </div>
        <div class="client-circle-3">
            <div class="circle"></div>
        </div>
        <div class="client-circle-4">
            <div class="circle"></div>
        </div>
        <div class="client-circle-5">
            <div class="circle"></div>
        </div>
        <div class="client-circle-6">
            <div class="circle"></div>
        </div>
        <div class="client-circle-7">
            <div class="circle"></div>
        </div>
    </div>
</section>


<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color2">Latest Blog</span>
            <h2>Let’s Check Some Latest Blog</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="images/blog/blog-img1.jpg" alt="Blog Images">
                        </a>
                        <div class="blog-tag">
                            <h3>11</h3>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="content">
                        <ul>
                            <li>
                                <a href="index.html"><i class='bx bxs-user'></i> By Admin</a>
                            </li>
                            <li>
                                <a href="index.html"><i class='bx bx-purchase-tag-alt'></i>Business</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="blog-details.html">Product Idea Solution for New Generation</a>
                        </h3>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                        <a href="blog-details.html" class="read-btn">Read More <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="images/blog/blog-img2.jpg" alt="Blog Images">
                        </a>
                        <div class="blog-tag">
                            <h3>14</h3>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="content">
                        <ul>
                            <li>
                                <a href="index.html"><i class='bx bxs-user'></i> By Admin</a>
                            </li>
                            <li>
                                <a href="index.html"><i class='bx bx-purchase-tag-alt'></i>Invention</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="blog-details.html">New Device Invention for Digital Platform</a>
                        </h3>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                        <a href="blog-details.html" class="read-btn">Read More <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="blog-card">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="images/blog/blog-img3.jpg" alt="Blog Images">
                        </a>
                        <div class="blog-tag">
                            <h3>17</h3>
                            <span>Dec</span>
                        </div>
                    </div>
                    <div class="content">
                        <ul>
                            <li>
                                <a href="index.html"><i class='bx bxs-user'></i> By Admin</a>
                            </li>
                            <li>
                                <a href="index.html"><i class='bx bx-purchase-tag-alt'></i>Achive</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="blog-details.html">Business Strategy Make His Goal Acheive </a>
                        </h3>
                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                        <a href="blog-details.html" class="read-btn">Read More <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="images/logos/footer-logo.png" alt="Images">
                            </a>
                        </div>
                        <p>
                            Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auct.Aenean, lorem quis bibendum auct. Aenean sollicitudin lorem.
                        </p>
                        <div class="footer-call-content">
                            <h3>Talk to Our Support</h3>
                            <span><a href="tel:+1002-123-4567">+1 002-123-4567</a></span>
                            <i class='bx bx-headphone'></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>Services</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    IT Consultancy
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Business Solution
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Digital Services
                                </a>
                            </li>
                            <li>
                                <a href="compare.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Business Reform
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Web Development
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Cloud Computing
                                </a>
                            </li>
                            <li>
                                <a href="service-details.html" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    Data Analysis
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-5">
                        <h3>Our Blog</h3>
                        <ul class="footer-blog">
                            <li>
                                <a href="blog-details.html">
                                    <img src="images/blog/blog-img-footer.jpg" alt="Images">
                                </a>
                                <div class="content">
                                    <h3><a href="blog-details.html">Product Idea Solution For New Generation</a></h3>
                                    <span>04 Dec 2020</span>
                                </div>
                            </li>
                            <li>
                                <a href="blog-details.html">
                                    <img src="images/blog/blog-img-footer2.jpg" alt="Images">
                                </a>
                                <div class="content">
                                    <h3><a href="blog-details.html">New Device Invention for Digital Platform</a></h3>
                                    <span>07 Dec 2020</span>
                                </div>
                            </li>
                            <li>
                                <a href="blog-details.html">
                                    <img src="images/blog/blog-img-footer3.jpg" alt="Images">
                                </a>
                                <div class="content">
                                    <h3><a href="blog-details.html">Business Strategy Make His Goal Acheive</a></h3>
                                    <span>10 Dec 2020</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget">
                        <h3>Newsletter</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum finibus molestie molestie. Phasellus ac rutrum massa, et volutpat nisl. Fusce ultrices suscipit nisl.</p>
                        <div class="newsletter-area">
                            <form class="newsletter-form" data-toggle="validator" method="POST">
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL" required autocomplete="off">
                                <button class="subscribe-btn" type="submit">
                                    <i class='bx bx-paper-plane'></i>
                                </button>
                                <div id="validator-newsletter" class="form-result"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    Copyright © <script>
                        document.write(new Date().getFullYear())
                    </script> Techex. All Rights Reserved by
                    <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a>
                </p>
            </div>
        </div>
    </div>
</footer>


<div class="switch-box">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>
@endsection
