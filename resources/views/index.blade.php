<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ __('Hania Sinjab') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href=" {{ asset('frontend') }}/img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand"><img src="{{ asset('frontend') }}/img/test.ico"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="#home" class="nav-item nav-link active">{{ __('Home') }}</a>
                    <a href="#about" class="nav-item nav-link">{{ __('About') }}</a>
                    <a href="#experience" class="nav-item nav-link">{{ __('Experience') }}</a>
                    <a href="#portfolio" class="nav-item nav-link">{{ __('Course') }}</a>
                    <a href="#contact" class="nav-item nav-link">{{ __('Contact') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Hero Start -->
    <div class="hero" id="home">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6">
                    <div class="hero-content">
                        <div class="hero-text">
                            <br>
                            <p> </p>
                            <p>{{ __('I am') }}</p>
                            <h1>{{ __('Hania Sinjab') }}</h1>
                            <h2></h2>
                            <div class="typed-text">
                                {{ __('Social Worker, Life Coaching, Psychological Comfort Content') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="service" data-wow-delay="0.1s" id="about">
        <div class="container">
            <div class="section-header text-center">
                <p>{{ __('Learn About Me') }}</p>
                <h2>{{ __('10 Years Experience') }}</h2>
            </div>
            <div>
                <p>
                    {{ __('----------------------------------------any thing --------------------------------------------') }}
                </p>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Experience Start -->
    <div class="experience" id="experience">
        <div class="container">
            <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>{{ __('My Resume') }}</p>
                <h2>{{ __('Working Experience') }}</h2>
            </header>
            <div class="timeline">
                <div class="timeline-item left wow slideInLeft" data-wow-delay="0.1s">
                    <div class="timeline-text">
                        <div class="timeline-date">2015 - 2020</div>
                        <h2>{{ __('Social Worker') }}</h2>
                        <h4>{{ __('Damascus - Syria') }}</h4>
                        <p>
                            ----------------------any thing --------------------------
                        </p>
                    </div>
                </div>
                <div class="timeline-item right wow slideInRight" data-wow-delay="0.1s">
                    <div class="timeline-text">
                        <div class="timeline-date">2010 - 2015</div>
                        <h2>{{ __('Psychological Comfort Content') }}</h2>
                        <h4>{{ __('Damascus - Syria') }}</h4>
                        <p>
                            ----------------------any thing --------------------------
                        </p>
                    </div>
                </div>
                <div class="timeline-item left wow slideInLeft" data-wow-delay="0.1s">
                    <div class="timeline-text">
                        <div class="timeline-date">2005 - 2010</div>
                        <h2>{{ __('Life Coaching') }}</h2>
                        <h4>{{ __('Damascus - Syria') }}</h4>
                        <p>
                            ----------------------any thing --------------------------
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Experience End -->


    <!-- Banner Start -->
    <div class="banner wow zoomIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-header text-center">
                <p>{{ __('Reasonable Price') }}</p>
                <h2>{{ __('Get A') }} <span>{{ __('Special') }}</span> {{ __('Price') }}</h2>
            </div>
            <div class="container banner-text">
                <p>
                    {{ __('Subscribe To Courses Now') }}
                </p>
                <a class="btn">{{ __('View Courses') }}</a>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Portfolio Start -->
    <div class="portfolio" id="portfolio">
        <div class="container">
            <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
                <p>{{ __('Courses') }}</p>
                <h2>{{ __('My Latest Courses') }}</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul id="portfolio-filter">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-1">Web Design</li>
                        <li data-filter=".filter-2">Mobile Apps</li>
                        <li data-filter=".filter-3">Game Dev</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{ asset('frontend') }}/img/portfolio-1.jpg" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>eCommerce Website</h3>
                            <a class="btn" href="img/portfolio-1.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-2 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{ asset('frontend') }}/img/portfolio-2.jpg" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>Product Landing Page</h3>
                            <a class="btn" href="img/portfolio-2.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{ asset('frontend') }}/img/portfolio-3.jpg" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>JavaScript quiz game</h3>
                            <a class="btn" href="img/portfolio-3.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{ asset('frontend') }}/img/portfolio-4.jpg" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>JavaScript drawing</h3>
                            <a class="btn" href="img/portfolio-4.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-2 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{ asset('frontend') }}/img/portfolio-5.jpg" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>Social Mobile Apps</h3>
                            <a class="btn" href="img/portfolio-5.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-3 wow fadeInUp" data-wow-delay="1s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{ asset('frontend') }}/img/portfolio-6.jpg" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>Company Website</h3>
                            <a class="btn" href="img/portfolio-6.jpg" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
            </div>
            <ul id="portfolio-filter">
                <li class="btn ">{{ __('More Courses') }}</li>
            </ul>
        </div>
    </div>
    <!-- Portfolio End -->

    <!-- Footer Start -->
    <div class="footer wow fadeIn" data-wow-delay="0.3s" id="contact">
        <div class="container-fluid">
            <div class="container">
                <div class="footer-info">
                    <h2>{{ __('Hania Sinjab') }}</h2>
                    <h3>{{ __('Damascus - Syria') }}</h3>
                    <div class="footer-menu">
                        <h3>+012 345 67890</h3>
                        <h3>info@example.com</h3>
                    </div>
                    <div class="footer-social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <p>&copy; <a href="#">{{ __('Hania Sinjab') }}</a>, All Right Reserved | Designed By <a
                        href="https://htmlcodex.com">Crazy Beeez</a></p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to top button -->
    <a href="#" class="btn back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- Pre Loader -->
    <div id="loader" class="show">
        <div class="loader"></div>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/typed/typed.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('frontend') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('frontend') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>
</body>

</html>
