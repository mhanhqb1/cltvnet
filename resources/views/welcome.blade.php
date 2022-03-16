
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>eTube - HTML5 Video Blog Site Template</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
    <!-- LOAD CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pgwslider.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/pgwslideshow.min.css">
    <link rel="stylesheet" href="css/megamenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!-- PRE LOADER -->
      <div class="preloader">
         <div class='uil-ring-css' style='transform:scale(0.45);'><div></div></div>
      </div>
    <!-- Start Header -->
    <header>
        <div class="header-top hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-top-area">
                            <div class="site-info left">
                                <div class="mail-address">
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:nfo@themeix.com">info@themeix.com </a>
                                    <span class="sepator">|</span>
                                </div>
                                <div class="server-time">
                                    <i class="fa fa-clock-o"></i>
                                    <span>Server time : 12.00am</span>
                                </div>
                            </div>
                            <div class="user-info right">
                                <div class="upload-opt">
                                    <i class="fa fa-upload"></i>
                                    <a href="#upload-options" data-bs-toggle="modal">upload video</a>
                                    <span class="sepator">|</span>
                                </div>
                                <div class="login-info">
                                    <i class="fa fa-lock"></i>
                                    <a href="#login-info" data-bs-toggle="modal">login</a>
                                </div>
                            </div>
                            <div id="upload-options" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Upload Your Video</h3>
                                            <button class="btn btn-sm btn-default close-btn" data-bs-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="post" class="upload-form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="video_title">Video Title</label>
                                                    <input type="text" class="form-control" id="video_title" placeholder="Video Title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="video-desc">Video Description</label>
                                                    <textarea name="video-desc" id="video-desc" class="form-control" placeholder="Video Description"></textarea>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="upload_file" class="custom-file-upload">Select Your File
                                                        <input type="file" name="upload_file" id="upload_file">
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="login-info" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Login Here..</h3>
                                            <button data-bs-dismiss="modal" class="btn btn-sm btn-default close-btn">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="post" class="login-form">
                                                <div class="form-group">
                                                    <label for="user_name">Username :</label>
                                                    <input type="text" name="user_name" class="form-control" id="user_name" placeholder="username">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="user_password">Password :</label>
                                                    <input type="password" name="user_password" class="form-control" id="user_password" placeholder="password">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation area starts -->
        <div class="main-menu">
            <!-- Start Navigation -->
            <nav class="header-section pin-style">
                <div class="container">
                       <div class="mod-menu">
                        <div class="row">
                            <div class="col-3">
                                <a href="index.html " title="logo" class="logo"><img src="images/logo.png" alt="logo"></a>
                            </div>
                            <div class="col-9 nopadding">
                                <div class="main-nav rightnav">
                                    <ul class="top-nav">
                                        <li class="visible-this d-md-none menu-icon">
                                            <a href="#" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#menu" aria-expanded="false"><i class="fa fa-bars"></i></a>
                                        </li>
                                    </ul>
                                    <div id="menu" class="collapse header-menu">
                                        <ul class="nav themeix-nav">
                                            <li><a href="#">Home</a><span class="arrow"></span>
                                                <ul class="dm-align-2 mega-list">
                                                    <li><a href="index.html">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="index-3.html">Home Three</a></li>
                                                    <li><a href="index-4.html">Home Four</a></li>
                                                    <li><a href="/rtl-demo">Home RTL</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a> <span class="arrow"></span>
                                                <ul class="dm-align-2 mega-list">
                                                    <li><a href="index.html">Home</a></li>
                                                    <li><a href="index-2.html">Home 2</a></li>
                                                    <li><a href="index-3.html">Home 3</a></li>
                                                    <li><a href="blog.html">Blog<span class="sub-arrow dark right"><i class="fa fa-angle-right"></i></span></a><span class="arrow"></span>
                                                        <ul>
                                                           <li><a href="single-blog.html">Single Blog</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="videos.html">All Videos<span class="sub-arrow dark right"><i class="fa fa-angle-right"></i></span></a><span class="arrow"></span>
                                                        <ul>
                                                            <li><a href="single-video.html">Single Video</a></li>
                                                            <li><a href="single-video-2.html">Single Video 2</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">blog</a> </li>
                                            <li class="mega-menu remove-border active"><a href="#">Mega Menu</a><span class="arrow"></span>
                                                <ul>
                                                    <li><span class="subtitle">Home Pages</span> <span class="arrow"></span>
                                                        <ul class="mega-list">
                                                            <li><a href="index.html"><i class="fa fa-home"></i>Home One</a></li>
                                                            <li><a href="index-2.html"><i class="fa fa-home"></i>Home Two</a></li>
                                                            <li><a href="index-3.html"><i class="fa fa-home"></i>Home Three</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><span class="subtitle">Blog Pages</span> <span class="arrow"></span>
                                                        <ul class="mega-list">
                                                            <li><a href="blog.html"><i class="fa fa-angle-right"></i>Blog Grid Style</a></li>
                                                            <li><a href="single-blog.html"><i class="fa fa-angle-right"></i>Blog Single Page</a></li>
                                                            <li><a href="single-video.html"><i class="fa fa-angle-right"></i>Single Video</a></li>

                                                        </ul>
                                                    </li>
                                                    <li><span class="subtitle">Video Pages</span><span class="arrow"></span>
                                                        <ul class="mega-list">
                                                            <li><a href="videos.html"><i class="fa fa-angle-right"></i>All Videos</a></li>
                                                            <li><a href="single-video.html"><i class="fa fa-angle-right"></i>Single Video V1</a></li>
                                                            <li><a href="single-video-2.html"><i class="fa fa-angle-right"></i>Single Video V2</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><span class="subtitle">Extra Pages</span> <span class="arrow"></span>
                                                        <ul class="mega-list">
                                                            <li><a href="single-blog.html"><i class="fa fa-angle-right"></i>Single Blog</a></li>
                                                            <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact</a></li>
                                                            <li><a href="single-video.html"><i class="fa fa-angle-right"></i>Single Video</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html" title="contact">Contact</a></li>
                                            <li><a href="single-blog.html" title="single blog">Single Blog</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </nav>
            <!-- end navigation -->
        </div>
        <!-- Navigation area ends -->
    </header>
    <!-- End Header -->
    <!-- Start Page Banner -->
    <div class="page-banner-area page-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-banner">
                        <div class="page-title">
                            <h2>Contact</h2>
                        </div>
                        <div class="page-breadcrumb">
                            <p><a href="index.html">home</a> / Contact</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Banner -->
    <!-- Start Contat Page -->
    <div class="contact-page-area themeix-ptb themeix-info">
    <div class="container">
        <div class="row">
         <div class="col-md-6">
         <div class="row">
             <div class="col-md-12">
              <div class="themeix-section-h">
                  <span class="heading-icon"><i class="fa fa-envelope"></i></span>
                  <h3>send Message</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
              </div>
             </div>
         </div>

          <div class="contact-form">
              <form action="#" method="post" class="row">
                  <div class="col-md-6">
                      <div class="form-group mb-3">
                          <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group mb-3">
                          <input type="email" name="email" id="email" class="form-control" placeholder="Email *" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group mb-3">
                          <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone *" required >
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group mb-3">
                          <input type="text" name="website" id="website" class="form-control" placeholder="Website *" required>
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group mb-3">
                          <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
                      </div>
                  </div>
                  <div class="col-md-4">
                       <div class="form-group mb-3">
                           <button type="submit" class="themeix-btn-danger text-uppercase">Send Message</button>
                       </div>
                  </div>
              </form>
          </div>

         </div>
         <!-- Start Contact Page Video -->
         <div class="col-md-6">
             <div class="contact-video">
                <div id="map-id"></div>
             </div>
         </div>
         <!-- End Contact Page Video -->
        </div>
    </div>

    </div>
    <!-- End Contact Page -->
    <!-- Start Video Carousel -->
    <div class="video-carousel-area themeix-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="themeix-section-h">
                        <span class="heading-icon"><i class="fa fa-copy"></i></span>
                        <h3>Related Videos</h3>
                    </div>
                    <div class="video-carousel owl-carousel">
                        <div class="single-video">
                            <div class="video-img">
                                <a href="single-video.html">
                                    <img class="lazy" data-src="images/thumbnails/28.jpg" alt="Video" />
                                     <noscript>
                                        <img src="images/thumbnails/28.jpg" alt="video" />
                                    </noscript>
                                </a>
                                <span class="video-duration">5.28</span>
                            </div>
                            <div class="video-content">
                                <h4><a href="single-video.html" class="video-title">Funny videos 2016 funny pranks try not to laugh challenge</a></h4>
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
                                        <div class="video-like-counter">
                                            <span class="far fa-thumbs-down dislike-icon"></span>
                                            <span>2140</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img">
                                <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/2.jpg" alt="Video" />
                                 <noscript>
                                    <img src="images/thumbnails/2.jpg" alt="video" />
                                </noscript>
                                </a>
                                <span class="video-duration">3.11</span>
                            </div>
                            <div class="video-content">
                                <h4><a href="single-video.html" class="video-title">Double Chocolate-Stuffed Mini Churros </a></h4>
                                <div class="video-counter">
                                    <div class="video-viewers">
                                        <span class="fa fa-eye view-icon"></span>
                                        <span>241,021</span>
                                    </div>
                                    <div class="video-feedback">
                                        <div class="video-like-counter">
                                            <span class="far fa-thumbs-up like-icon"></span>
                                            <span>996</span>
                                        </div>
                                        <div class="video-like-counter">
                                           <span class="far fa-thumbs-down dislike-icon"></span>
                                            <span>2140</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img">
                                <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/23.jpg" alt="Video" />
                                 <noscript>
                                    <img src="images/thumbnails/23.jpg" alt="video" />
                                </noscript>
                                </a>
                                <span class="video-duration">5.10</span>
                            </div>
                            <div class="video-content">
                                <h4><a href="single-video.html" class="video-title">Greek-Style Pasta Bake (Pasticcio - English Recipe)</a></h4>
                                <div class="video-counter">
                                    <div class="video-viewers">
                                        <span class="fa fa-eye view-icon"></span>
                                        <span>241,021</span>
                                    </div>
                                    <div class="video-feedback">
                                        <div class="video-like-counter">
                                            <span class="far fa-thumbs-up like-icon"></span>
                                            <span>785</span>
                                        </div>
                                        <div class="video-like-counter">
                                            <span class="far fa-thumbs-down dislike-icon"></span>
                                            <span>2140</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img">
                                <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/4.jpg" alt="Video" />
                                 <noscript>
                                    <img src="images/thumbnails/4.jpg" alt="video" />
                                </noscript>
                                </a>
                                <span class="video-duration">2.29</span>
                            </div>
                            <div class="video-content">
                                <h4><a href="single-video.html" class="video-title">Rainbow Sprinkle Cinnamon Rolls (Gougeres Video)</a></h4>
                                <div class="video-counter">
                                    <div class="video-viewers">
                                        <span class="fa fa-eye view-icon"></span>
                                        <span>991,021</span>
                                    </div>
                                    <div class="video-feedback">
                                        <div class="video-like-counter">
                                            <span class="far fa-thumbs-up like-icon"></span>
                                            <span>7456</span>
                                        </div>
                                        <div class="video-like-counter">
                                            <span class="far fa-thumbs-down dislike-icon"></span>
                                            <span>2140</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-video">
                            <div class="video-img">
                                <a href="single-video.html">
                                <img class="lazy" data-src="images/thumbnails/5.jpg" alt="Video" />
                                </a>
                                <span class="video-duration">5.28</span>
                            </div>
                            <div class="video-content">
                                <h4><a href="single-video.html" class="video-title">Buffalo Chicken Potato Skins  (Gougeres English Video)</a></h4>
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
                                        <div class="video-like-counter">
                                           <span class="far fa-thumbs-down dislike-icon"></span>
                                            <span>2140</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Video Carousel -->
    <!-- Start Call To Action Area -->
    <div class="call-to-action-area hover-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="action-content">
                        <h2>Enough imporessed to get own video blog?</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="purchase-link text-right text-sm-center text-xs-center">
                        <a href="#" class="themeix-purchase-btn-3">purchase now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Call To Action Area -->
    <!-- Start Footer Area -->
    <footer>
        <div class="footer-area themeix-ptb">
            <div class="footer-wrapper">
            <div class="container">
                <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-footer">
                                <div class="footer-heading-wrap">
                                    <span class="heading-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></span>
                                    <h3 class="footer-heading">About Us</h3>
                                </div>
                                <div class="single-footer-text">
                                    <p>Vestibulum quis cursus mi, vitae mollis metus.Nulam eu lects gravida, bibendum enim in, vulputate erat. Vestibulum ullamcorper ornare magna</p>
                                </div>
                                <div class="social-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="fb-link"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="gp-link"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-footer">
                                <div class="footer-heading-wrap">
                                    <span class="heading-icon"><i class="fa fa fa-link" aria-hidden="true"></i></span>
                                    <h3 class="footer-heading">Important links</h3>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="#">Submit New Video</a></li>
                                        <li><a href="#">Popular Videos</a></li>
                                        <li><a href="#">Trending Videos</a></li>
                                        <li><a href="#">Most watched Videos</a></li>
                                        <li><a href="#">Latest Videos</a></li>
                                        <li><a href="#">Video Authors</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-footer">
                                <div class="footer-heading-wrap">
                                    <span class="heading-icon"><i class="fa fa-life-ring" aria-hidden="true"></i></span>
                                    <h3 class="footer-heading">get support</h3>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="#">Our Forum</a></li>
                                        <li><a href="#">Facebook Page</a></li>
                                        <li><a href="#">Live Chat</a></li>
                                        <li><a href="#">Toll Free Number</a></li>
                                        <li><a href="#">Support Agent</a></li>
                                        <li><a href="#">Tickets</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="single-footer">
                                <div class="footer-heading-wrap">
                                    <span class="heading-icon"><i class="fa fa-plane" aria-hidden="true"></i></span>
                                    <h3 class="footer-heading">contact us</h3>
                                </div>
                                <p>4100 S Choctaw Rd, Choctaw, OK, 73020</p>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="tel:+11231231234">T : +1 123 123 1234</a></li>
                                        <li><a href="tel:+11231234321">F : +1 123 123 4321</a></li>
                                        <li><a href="mailto:info@themeix.com">E : info@themeix.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom Area -->
        <div class="footer-bottom-area pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-bottom">
                            <div class="footer-logo">
                                <a href="#"><img src="images/logo.png" alt="logo"></a>
                            </div>
                            <div class="footer-links">
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Disclaimer</a></li>
                                </ul>
                            </div>
                            <div class="copyright-text">
                                <p>Etube &copy; <span id="spanYear"></span> - All rights reserved. - Proudly made with <a href="https://themeix.com">Themeix</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom Area -->
        <div class="scroll-top">
            <div class="scroll-icon">
                <i class="fa fa-angle-up"></i>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Load JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/pgwslideshow.min.js"></script>
    <script src="js/pgwslider.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.lazy.min.js"></script>
    <script src="js/jquery.lazy.plugins.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnh74UN6BKgq9U5fMNGhdZOSpmM_QnZqs"></script>
    <script src="js/megamenu.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
