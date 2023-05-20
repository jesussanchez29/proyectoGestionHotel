<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Site Properties -->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/apple-touch-icon.png') }}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tiny-date-picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media-query.css') }}" />
    <link rel="stylesheet" href={{ asset('css/personalizado.css') }}>
</head>

<body class="impx-body" id="top">
    <header id="impx-header">
        <div>
            <div class="impx-menu-wrapper style2"
                data-uk-sticky="top: .impx-page-heading; animation: uk-animation-slide-top">

                <!-- Mobile Nav Start -->
                <div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
                    <div class="uk-offcanvas-bar">

                        <ul class="uk-nav uk-nav-default">
                            <li class="uk-parent">
                                <a href="index.html">Home</a>
                                <ul class="uk-nav-sub">
                                    <li><a href="index.html">Homepage 1</a></li>
                                    <li><a href="index2.html">Homepage 2</a></li>
                                    <li><a href="index3.html">Homepage 3</a></li>
                                </ul>
                            </li>
                            <li class="uk-parent uk-active">
                                <a href="rooms1.html" class="uk-navbar-nav-subtitle">Rooms</a>
                                <ul class="uk-nav-sub">
                                    <li><a href="rooms1.html">Rooms Style 1</a></li>
                                    <li><a href="rooms2.html">Rooms Style 2</a></li>
                                    <li><a href="rooms3.html">Rooms Style 3</a></li>
                                    <li><a href="room-detail.html">Room Detail 1</a></li>
                                    <li><a href="room-detail2.html">Room Detail 2</a></li>
                                </ul>
                            </li>
                            <li><a href="restaurant.html">Restaurant</a></li>
                            <li><a href="spa.html">Spa</a></li>
                            <li><a href="activities.html">Activities</a></li>
                            <li class="uk-parent">
                                <a href="#">Pages</a>
                                <ul class="uk-nav-sub">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="testimonial.html">Testimonial</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-post.html">Single Post</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="element.html">Element</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>

                    </div>
                </div>
                <a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav"
                    data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i>Menu</a>
                <!-- Mobile Nav End -->

                <!-- Top Header -->
                <div class="impx-top-header style2">
                    <div class="uk-container uk-container-expand">
                        <div class="uk-grid">
                            <!-- header phone -->
                            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                                <div class="impx-top-phone">
                                    <p><i class="fa fa-phone"></i> Phone : +62 123456789</p>
                                </div>
                            </div><!-- header phone end-->
                            <!-- header social media -->
                            <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                                <div class="impx-top-social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook-f"></i>Facebook</a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    </ul>
                                </div>
                            </div><!-- header social media end -->
                        </div>
                    </div>
                </div>
                <!-- Top Header End -->

                <div class="uk-container uk-container-expand">
                    <div data-uk-grid>

                        <!-- Header Logo -->
                        <div class="uk-width-auto">
                            <div class="impx-logo">
                                <a href="index.html"><img src="images/logo.png" class="" alt="Logo"></a>
                            </div>
                        </div>
                        <!-- Header Logo End-->

                        <!-- Header Navigation -->
                        <div class="uk-width-expand uk-position-relative">
                            <nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m"
                                data-uk-navbar>
                                <div class="uk-navbar-right impx-navbar-right">

                                    <ul class="uk-navbar-nav impx-nav style2">
                                        <!-- Navigation Items -->
                                        <li class="uk-parent">
                                            <a href="index.html" class="uk-navbar-nav-subtitle">
                                                <div>Home<div class="uk-navbar-subtitle">Welcome</div>
                                                </div>
                                            </a>
                                            <div class="uk-navbar-dropdown">
                                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                                    <li><a href="index.html">Homepage 1</a></li>
                                                    <li><a href="index2.html">Homepage 2</a></li>
                                                    <li><a href="index3.html">Homepage 3</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="uk-parent uk-active">
                                            <a href="rooms1.html" class="uk-navbar-nav-subtitle">
                                                <div>Rooms<div class="uk-navbar-subtitle">Our Best Suites</div>
                                                </div>
                                            </a>
                                            <div class="uk-navbar-dropdown uk-navbar-dropdown-width-4 impx-megamenu"
                                                data-uk-drop="boundary: .impx-navbar-right; boundary-align: true; pos: bottom-justify;">
                                                <div class="uk-navbar-dropdown-grid uk-child-width-1-4" data-uk-grid>
                                                    <div>
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            <li class="uk-nav-header uk-text-bold">Rooms Page Style 1
                                                            </li>
                                                            <li>
                                                                <a href="rooms1.html"><img
                                                                        src="images/rooms/room-menu-1.jpg"
                                                                        alt=""></a>
                                                                <p
                                                                    class="uk-margin-small-bottom uk-margin-small-top impx-hidden-m">
                                                                    emper enim ita adsumit aliquid, quae dederit non</p>
                                                                <a class="uk-button uk-button-default uk-button-small impx-button impx-button-outline aqua small small-border"
                                                                    href="rooms1.html">Visit Page</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            <li class="uk-nav-header uk-text-bold">Rooms Page Style 2
                                                            </li>
                                                            <li>
                                                                <a href="rooms2.html"><img
                                                                        src="images/rooms/room-menu-2.jpg"
                                                                        alt=""></a>
                                                                <p
                                                                    class="uk-margin-small-bottom uk-margin-small-top impx-hidden-m">
                                                                    emper enim ita adsumit aliquid, quae dederit non</p>
                                                                <a class="uk-button uk-button-default uk-button-small impx-button impx-button-outline aqua small small-border"
                                                                    href="rooms2.html">Visit Page</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                                            <li class="uk-nav-header uk-text-bold">Rooms Page Style 3
                                                            </li>
                                                            <li>
                                                                <a href="rooms3.html"><img
                                                                        src="images/rooms/room-menu-3.jpg"
                                                                        alt=""></a>
                                                                <p
                                                                    class="uk-margin-small-bottom uk-margin-small-top impx-hidden-m">
                                                                    emper enim ita adsumit aliquid, quae dederit non</p>
                                                                <a class="uk-button uk-button-default uk-button-small impx-button impx-button-outline aqua small small-border"
                                                                    href="rooms3.html">Visit Page</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                                <li
                                                                    class="uk-nav-header uk-margin-small-bottom uk-text-bold">
                                                                    Room Detail Page</li>
                                                                <li>
                                                                    <div class="uk-grid-small" data-uk-grid>
                                                                        <div class="uk-width-auto">
                                                                            <i
                                                                                class="fa fa-check-square-o fa-05x circle impx-text-aqua border-aqua uk-margin-remove uk-visible@m"></i>
                                                                        </div>
                                                                        <div class="uk-width-expand">
                                                                            <p
                                                                                class="uk-margin-remove uk-visible@s impx-hidden-m">
                                                                                Sin tantum modo ad indicia veteris</p>
                                                                            <a href="room-detail.html">Room Detail 1
                                                                                &raquo;</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="uk-grid-small" data-uk-grid>
                                                                        <div class="uk-width-auto">
                                                                            <i
                                                                                class="fa fa-check-square-o fa-05x circle impx-text-aqua border-aqua uk-margin-remove uk-visible@m"></i>
                                                                        </div>
                                                                        <div class="uk-width-expand">
                                                                            <p
                                                                                class="uk-margin-remove uk-visible@s impx-hidden-m">
                                                                                Sin tantum modo ad indicia veteris</p>
                                                                            <a href="room-detail2.html"
                                                                                class="uk-margin-small-top">Room Detail
                                                                                2 &raquo;</a>
                                                                        </div>
                                                                    </div>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="restaurant.html">
                                                <div>Restaurant<div class="uk-navbar-subtitle">In-house Restaurant
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a href="spa.html">
                                                <div>Spa<div class="uk-navbar-subtitle">Our Spa Service</div>
                                                </div>
                                            </a></li>
                                        <li><a href="activities.html" class="uk-navbar-nav-subtitle">
                                                <div>Activities<div class="uk-navbar-subtitle">Our Facilities</div>
                                                </div>
                                            </a></li>
                                        <li class="uk-parent">
                                            <a href="#" class="uk-navbar-nav-subtitle">
                                                <div>Pages<div class="uk-navbar-subtitle">the Other Pages</div>
                                                </div>
                                            </a>
                                            <div class="uk-navbar-dropdown">
                                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="testimonial.html">Testimonial</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-post.html">Single Post</a></li>
                                                    <li><a href="gallery.html">Gallery</a></li>
                                                    <li><a href="element.html">Element</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="contact.html" class="uk-navbar-nav-subtitle">
                                                <div>Contact<div class="uk-navbar-subtitle">Get in Touch</div>
                                                </div>
                                            </a></li>
                                    </ul>
                                    <!-- Navigation Items End -->
                                </div>
                            </nav>
                        </div>
                        <!-- Header Navigation End -->

                        <!-- Promo Ribbon -->
                        <div class="uk-width-auto uk-position-relative">
                            <div class="ribbon">
                                <i><span><s></s>30% <span>Off!</span><s></s></span></i>
                            </div>
                        </div>
                        <!-- Promo Ribbon End -->

                    </div>
                </div>
            </div>
        </div>

    </header> <!-- SLIDESHOW -->

    @yield('heading')

    @yield('content')

    <!-- CONTACT INFO -->
    <div class="pre-footer-contact uk-padding bg-img2 uk-position-relative">
        <div class="impx-overlay dark"></div>
        <div class="uk-container">

            <div data-uk-grid class="uk-padding-remove-bottom uk-position-relative">
                <div class="uk-light uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-3@s">
                    <!-- address -->
                    <h5 class="uk-heading-line uk-margin-remove-bottom"><span>Direccion</span></h5>
                    <p class="impx-text-large uk-margin-top">{{ $hotel->direccion }}, {{ $hotel->ciudad }}</p>
                </div>
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s">
                    <!-- phone -->
                    <h5 class="uk-heading-line uk-margin-bottom"><span>Telefono</span></h5>
                    <p class="impx-text-large uk-margin-remove">+34 {{ $hotel->telefono }}</p>
                </div>
                <div class="uk-light uk-width-1-4@xl uk-width-1-4@l uk-width-1-4@m uk-width-1-3@s">
                    <!-- email -->
                    <h5 class="uk-heading-line uk-margin-bottom"><span>Email</span></h5>
                    <a class="impx-text-large">{{ $hotel->email }}</a>
                </div>
            </div>

        </div>
    </div>
    <!-- CONTACT INFO END -->

    @include('Clientes.layouts.footer')

    <!-- Javascript -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBGb3xrNtz335X4G2KfoOXb-XuIyHAzlVo">
    </script>
    <script src="{{ asset('js/jquery.gmap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.parallax.min.js') }}"></script>
    <script src="{{ asset('js/tiny-date-picker.min.js') }}"></script>
    <script src="{{ asset('js/date-config.js') }}"></script>
    <script src="{{ asset('js/template-config.js') }}"></script>

</body>

</html>
