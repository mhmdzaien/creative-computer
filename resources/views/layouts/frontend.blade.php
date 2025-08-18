<!DOCTYPE html>
<!--
Template name: Nova
Template author: FreeBootstrap.net
Author website: https://freebootstrap.net/
License: https://freebootstrap.net/license
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="{{url('themes/frontend')}}/vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('themes/frontend')}}/vendors/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{url('themes/frontend')}}/vendors/glightbox/glightbox.min.css" rel="stylesheet">
    <link href="{{url('themes/frontend')}}/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{url('themes/frontend')}}/vendors/aos/aos.css" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    <link href="{{url('themes/frontend')}}/css/style.css" rel="stylesheet">

    @yield('stylesheet')
    <!-- End Theme Style-->

    <!-- ======= Apply theme =======-->
    <script>
        // Apply the theme as early as possible to avoid flicker
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
</head>

<body>


    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">


        <!-- ======= Header =======-->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
            <div class="container d-flex align-items-center justify-content-between">


                <!-- Start Logo-->
                <a class="navbar-brand w-auto" href="index.html">
                    <!-- If you use a text logo, uncomment this if it is commented-->
                    <!-- Vertex-->

                    <!-- If you plan to use an image logo, uncomment this if it is commented-->

                    <!-- logo dark--><img class="logo dark img-fluid" style="height: 50px;" src="/images/logo.png" alt="FreeBootstrap.net image placeholder">

                    <!-- logo light--><img class="logo light img-fluid" style="height: 50px;" src="/images/logo.png" alt="FreeBootstrap.net image placeholder">

                </a>
                <!-- End Logo-->

                <!-- Start offcanvas-->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1" aria-labelledby="fbs__net-navbarsLabel">


                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <!-- If you use a text logo, uncomment this if it is commented-->

                            <!-- h5#fbs__net-navbarsLabel.offcanvas-title Vertex-->

                            <!-- If you plan to use an image logo, uncomment this if it is commented-->
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">


                                <!-- logo dark--><img class="logo dark img-fluid" src="{{url('themes/frontend')}}/images/logo-dark.svg" alt="FreeBootstrap.net image placeholder">

                                <!-- logo light--><img class="logo light img-fluid" src="{{url('themes/frontend')}}/images/logo-light.svg" alt="FreeBootstrap.net image placeholder"></a>

                        </div>
                        <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body align-items-lg-center">
                        <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link scroll-link" aria-current="page" href="{{url('/#home')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="{{url('/#services')}}">Layanan</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/produk">Produk</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/cek-service">Cek Status Service</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="{{url('/#about')}}">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="{{url('/#contact')}}">Kontak</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End offcanvas-->

                <div class="ms-auto w-auto">


                    <div class="header-social d-flex align-items-center gap-1"><a class="btn btn-primary py-2" href="#">Get Started</a>

                        <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto" data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars" aria-controls="fbs__net-navbars" aria-label="Toggle navigation" aria-expanded="false">
                            <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="21" x2="3" y1="6" y2="6"></line>
                                <line x1="15" x2="3" y1="12" y2="12"></line>
                                <line x1="17" x2="3" y1="18" y2="18"></line>
                            </svg>
                            <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>

                    </div>

                </div>
            </div>
        </header>
        <!-- End Header-->

        <!-- ======= Main =======-->
        <main>


            @yield('content')

            <!-- ======= Footer =======-->
            <footer class="footer pt-5 pb-5">
                <div class="container">
                    <div class="row justify-content-between mb-5 g-xl-5">
                        <div class="col-md-4 mb-5 mb-lg-0">
                            <h3 class="mb-3">About</h3>
                            <p class="mb-4">Pusat layanan penjualan dan perbaikan komputer.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="row g-2">
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Media Sosial</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="https://www.instagram.com/creativecompnagara">Instagram : @creativecompnagara</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-6 mb-4 mb-lg-0 quick-contact">
                                    <h3 class="mb-3">Kontak</h3>
                                    <p class="d-flex mb-3">
                                        <i class="bi bi-geo-alt-fill me-3"></i>
                                        <span>Jl. Pelabuhan No. 52 RT. 3 RK. II Tumbukan Banyu, Nagara, Kec. Daha Sel.,<br />Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71252</span>
                                    </p>
                                    <a class="d-flex mb-3" href="mailto:info@mydomain.com">
                                        <i class="bi bi-envelope-fill me-3"></i><span>info@mydomain.com</span>
                                    </a>
                                    <a class="d-flex mb-3" href="tel://+123456789900">
                                        <i class="bi bi-telephone-fill me-3"></i><span>+621234567890</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row credits pt-3">
                        <div class="col-xl-8 text-center text-xl-start mb-3 mb-xl-0">
                            <!--
                Note:
                =>>> Please keep all the footer links intact. <<<=
                =>>> You can only remove the links if you buy the pro version. <<<=
                =>>> Buy the pro version, which includes a functional PHP/AJAX contact form and many additional features.: https://freebootstrap.net/template/vertex-pro-bootstrap-website-template-for-portfolio/ <<<=
                -->
                            &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> Creative Computer.
                            All rights reserved. Designed with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://freebootstrap.net">FreeBootstrap.net</a>
                        </div>
                        <div class="col-xl-4 justify-content-start justify-content-xl-end quick-links d-flex flex-column flex-xl-row text-center text-xl-start gap-1">Distributed by<a href="https://themewagon.com" target="_blank">ThemeWagon</a></div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->

        </main>
    </div>

    <!-- ======= Back to Top =======-->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="{{url('themes/frontend')}}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/gsap/gsap.min.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/glightbox/glightbox.min.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/aos/aos.js"></script>
    <script src="{{url('themes/frontend')}}/vendors/purecounter/purecounter.js"></script>
    <script src="{{url('themes/frontend')}}/js/custom.js"></script>
    <script src="{{url('themes/frontend')}}/js/send_email.js"></script>
    <!-- End JavaScripts-->

    @yield('script')
</body>

</html>