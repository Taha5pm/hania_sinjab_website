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
                    <a href="{{ route('index') }}" class="nav-item nav-link active">{{ __('messages.home') }}</a>
                    <a href="{{ route('index') }}" class="nav-item nav-link">{{ __('messages.about') }}</a>
                    <a href="#contact" class="nav-item nav-link">{{ __('messages.contact') }}</a>
                    @if (Auth::check())
                        <a href="{{ route('sub_logout') }}" class="nav-item nav-link">{{ __('messages.logout') }}</a>
                    @else
                        <a href="{{ route('sub_login') }}" class="nav-item nav-link">{{ __('messages.login') }}</a>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('messages.' . Config::get('languages')[App::getLocale()]) }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                        {{ __('messages.' . $language) }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Hero Start -->
    @mobile()
    <div class="portfolio" id="home">
        <div class="container-fluid">

        </div>
    </div>
    @endmobile()
    @desktop()
    <div class="hero" id="home">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6">
                    <div class="hero-content">
                        <div class="hero-text">
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @enddesktop()
    <!-- Hero End -->

    <!-- Blog Start -->
    <div class="blog" id="blog">
        <div class="container">
            <div class="section-header text-center wow zoomIn " data-wow-delay="0.1s">
                <h2>{{ __('messages.course') }}</h2>

                <form action="{{ route('course.index.search') }}" class="form-horizontal" method="get">
                    <div class="input-group no-border" id="portfolio-filter">
                        <input type="text" name="search" placeholder={{ __('messages.search') }}>
                        <button type="submit" class="btn align-item-right">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="row">
                @mobile()

                @foreach ($courses as $course)
                    <div class="col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay="0.1s">
                            <div class="blog-text">
                                <h2>{{ $course->name }}</h2>
                                <p>
                                    {{ $course->description }}
                                </p>
                                <a href="{{ route('videocourse', $course->id) }}" class="btn">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @endmobile()

                @desktop()
                @foreach ($courses as $course)
                    <div class="col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay="0.1s">
                            <div class="blog-text">
                                <h2>{{ $course->name }}</h2>
                                <p>
                                    {{ $course->description }}
                                </p>
                                <a href="{{ route('videocourse', $course->id) }}"
                                    class="btn">{{ __('messages.view') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @enddesktop()
            </div>

            <div class="pagination justify-content-center">
                {!! $courses->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div class="footer wow fadeIn" data-wow-delay="0.3s" id="contact">
        <div class="container-fluid">
            <div class="container">
                <div class="footer-info">
                    <h2>{{ __('messages.hania sinjab') }}</h2>
                    <h3>{{ __('messages.syria') }}</h3>
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
                <p>&copy; <a href="#">{{ __('messages.hania sinjab') }}</a>, All Right Reserved | Designed By <a
                        href="https://crazybeeez.com">Crazy Beeez</a></p>
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
