@extends('layouts.frontend')
@section('content')
<!-- ======= Hero =======-->
<section class="hero__v6 section" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="row">
                    <div class="col-lg-11"><span class="hero-subtitle text-uppercase" data-aos="fade-up" data-aos-delay="0">Innovative Fintech Solutions</span>
                        <h1 class="hero-title mb-3" data-aos="fade-up" data-aos-delay="100">Layanan Komputer Terpercaya</h1>
                        <p class="hero-description mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">Penjualan dan berpengalaman dalam perbaikan komputer, laptop, dan elektronik lainnya..</p>
                        <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="300"><a class="btn" href="/produk">Lihat Produk</a><a class="btn btn-white-outline" href="/cek-service">Cek Status Servis
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
@endsection