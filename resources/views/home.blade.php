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
                            <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page" href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#services">Layanan</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/produk">Produk</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="/services">Cek Status Service</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#about">Tentang Kami</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#contact">Kontak</a></li>
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


            <!-- ======= Hero =======-->
            <section class="hero__v6 section" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-11"><span class="hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0">Innovative Fintech Solutions</span>
                                    <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">Layanan Komputer Terpercaya</h1>
                                    <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">Penjualan dan berpengalaman dalam perbaikan komputer, laptop, dan elektronik lainnya..</p>
                                    <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300"><a class="btn" href="#">Lihat Produk</a><a class="btn btn-white-outline" href="#">Cek Status Servis
                                            <svg class="lucide lucide-arrow-up-right" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h10v10"></path>
                                                <path d="M7 17 17 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img"><img class="img-card img-fluid" src="{{url('themes/frontend')}}/images/card-expenses.png" alt="Image card" data-aos="fade-down" data-aos-delay="600"><img class="img-main img-fluid rounded-4" src="{{url('themes/frontend')}}/images/hero-img-1-min.jpg" alt="Hero Image" data-aos="fade-in" data-aos-delay="500"></div>
                        </div>
                    </div>
                </div>
                <!-- End Hero-->
            </section>
            <!-- End Hero-->



            <!-- ======= Services =======-->
            <section class="section services__v3" id="services">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Layanan Kami</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">Kami menyediakan penjualan dan perbaikan komputer, laptop, printer, CCTV, dan elektronik lainnya.</h2>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="service-card p-4 rounded-4 h-100 d-flex flex-column justify-content-between gap-5">
                                <div>
                                    <img class="img-fluid mb-4" src="/themes/frontend/images/perbaikan-komputer.jpg" />
                                    <h3 class="fs-5 mb-3">Perbaikan Komputer</h3>
                                    <p class="mb-4">Servis dan perbaikan komputer dengan teknisi berpengalaman dan terpercaya.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="service-card p-4 rounded-4 h-100 d-flex flex-column justify-content-between gap-5">
                                <div>
                                    <img class="img-fluid mb-4" src="/themes/frontend/images/perbaikan-laptop.jpg" />
                                    <h3 class="fs-5 mb-3">Perbaikan Laptop</h3>
                                    <p class="mb-4">Layanan perbaikan laptop cepat dan efisien untuk berbagai merek dan model.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="service-card p-4 rounded-4 h-100 d-flex flex-column justify-content-between gap-5">
                                <div>
                                    <img class="img-fluid mb-4" src="/themes/frontend/images/pemasangan-cctv.jpg" />
                                    <h3 class="fs-5 mb-3">Pemasangan CCTV</h3>
                                    <p class="mb-4">Kami juga melayani perbaikan printer dan instalasi CCTV dengan kualitas terbaik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services-->

            <!-- ======= About =======-->
            <section class="about__v4 section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 order-md-2">
                            <div class="row justify-content-end">
                                <div class="col-md-11 mb-4 mb-md-0"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Tentang Kami</span>
                                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="100">Memberikan Layanan Terbaik dan Berpengalaman</h2>
                                    <div data-aos="fade-up" data-aos-delay="200">
                                        <p>Kami adalah pusat layanan penjualan dan perbaikan komputer, laptop, printer, CCTV, dan berbagai perangkat elektronik lainnya, siap membantu Anda dengan solusi terbaik.</p>
                                    </div>
                                    <h4 class="small fw-bold mt-4 mb-3" data-aos="fade-up" data-aos-delay="300">Key Values and Vision</h4>
                                    <ul class="d-flex flex-row flex-wrap list-unstyled gap-3 features" data-aos="fade-up" data-aos-delay="400">
                                        <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span><span class="text">Terpercaya</span></li>
                                        <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span><span class="text">Berkualitas</span></li>
                                        <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span><span class="text">Ternjangkau</span></li>
                                        <li class="d-flex align-items-center gap-2"><span class="icon rounded-circle text-center"><i class="bi bi-check"></i></span><span class="text">Profesional</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap position-relative"><img class="img-fluid rounded-4" src="{{url('themes/frontend')}}/images/about_2-min.jpg" alt="FreeBootstrap.net image placeholder" data-aos="fade-up" data-aos-delay="0">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About-->

            <!-- ======= Testimonials =======-->
            <!-- <section class="section testimonials__v2" id="testimonials">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-5 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Testimonials</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">What Our Users Are Saying</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Real Stories of Success and Satisfaction from Our Diverse Community</p>
                        </div>
                    </div>
                    <div class="row g-4" data-masonry="{&quot;percentPosition&quot;: true }">
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    This platform has completely transformed the way I manage my business finances. The real-time transaction tracking and seamless payment options have saved me so much time and effort!
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="{{url('themes/frontend')}}/images/person-sq-2-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">John Davis</strong><span>Small Business Owner</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    As a freelancer, managing my finances can be overwhelming. The budgeting tools and personalized insights have made it so much easier to stay on top of my expenses and plan for the future.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="{{url('themes/frontend')}}/images/person-sq-1-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">Emily Smith</strong><span>Freelancer</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    The investment options and portfolio management tools on this platform are top-notch. The variety of choices caters to all types of investors, from conservative to aggressive. I especially appreciate how the tailored recommendations align perfectly with my financial goals. It’s a game-changer for anyone serious about growing their wealth.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="{{url('themes/frontend')}}/images/person-sq-5-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">Michael Rodriguez</strong><span>Investor</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    I never thought managing money could be this simple! The user-friendly interface and secure transaction process give me the confidence to handle my finances independently.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="{{url('themes/frontend')}}/images/person-sq-3-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">Sarah Lee</strong><span>College Student</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    The security features are outstanding. Knowing that my financial data is protected gives me peace of mind, and the platform's efficiency makes it a pleasure to use.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="{{url('themes/frontend')}}/images/person-sq-7-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">James Kim</strong><span>IT Consultant</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;
                                    The platform’s intuitive design and robust features have been a game-changer for my startup. It’s helped me streamline operations and focus on growing my business.
                                    &rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid" src="{{url('themes/frontend')}}/images/person-sq-8-min.jpg" alt="FreeBootstrap.net image placeholder"></div>
                                    <div class="lh-base"><strong class="d-block">Laura Brown</strong><span>Entrepreneur</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Testimonials-->

            <!-- ======= Contact =======-->
            <section class="section contact__v2" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3" data-aos="fade-up" data-aos-delay="0">Contact</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Contact Us</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Utilize our tools to develop your concepts and bring your vision to life. Once complete, effortlessly share your creations.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-5 flex-column">
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="0">
                                    <div class="icon d-block"><i class="bi bi-telephone"></i></div><span> <span class="d-block">Phone</span><strong>+621234567890</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon d-block"><i class="bi bi-send"></i></div><span> <span class="d-block">Email</span><strong>info@mydomain.com</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon d-block"><i class="bi bi-geo-alt"></i></div><span> <span class="d-block">Address</span>
                                        <address class="fw-bold">Jl. Pelabuhan No. 52 RT. 3 RK. II Tumbukan Banyu, <br />Nagara, Kec. Daha Sel.,<br />Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71252</address>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form id="contactForm">
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="name">Nama</label>
                                            <input class="form-control" id="name" type="text" name="name" required="">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="row gap-3 gap-md-0 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="message">Pesan</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required=""></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary fw-semibold" type="submit">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact-->

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
</body>

</html>