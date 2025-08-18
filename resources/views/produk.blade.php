@extends('layouts.frontend')

@section('stylesheet')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

<link rel="stylesheet" type="text/css" href="/themes/frontend/css/vendor.css">
<link rel="stylesheet" type="text/css" href="/themes/frontend/css/produk.css">

@endsection

@section('script')
<script src="/themes/frontend/js/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="/themes/frontend/js/plugins.js"></script>
<script src="/themes/frontend/js/produk.js"></script>
@endsection


@section('content')
<section class="hero__v6" style="background-image: url('images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="banner-blocks">

                    <div class="banner-ad large bg-info block-1">

                        <div class="swiper main-swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">100% natural</div>
                                            <h3 class="display-4">Fresh Smoothie & Summer Juice</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim massa diam elementum.</p>
                                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">Shop Now</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <img src="/images/produk/highlight-1.png" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="banner-ad bg-success-subtle block-2" style="background:url('/images/produk/highlight-2.png') no-repeat;background-position: right bottom">
                        <div class="row banner-content p-5">

                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">20% off</div>
                                <h3 class="banner-title">Fruits & Vegetables</h3>
                                <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>

                    <div class="banner-ad bg-danger block-3" style="background:url('/images/produk/highlight-3.png') no-repeat;background-position: right bottom">
                        <div class="row banner-content p-5">

                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">15% off</div>
                                <h3 class="item-title">Baked Products</h3>
                                <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- / Banner Blocks -->

            </div>
        </div>
    </div>
</section>
<section class="py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">Kategori</h2>
                    <div class="d-flex align-items-center">
                        <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                            <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="category-carousel swiper">
                    <div class="swiper-wrapper">
                        <a href="index.html" class="nav-link category-item swiper-slide">
                            <img src="/icons/laptop.svg" class="icon-category" alt="Category Thumbnail">
                            <h3 class="category-title">Laptop</h3>
                        </a>
                        <a href="index.html" class="nav-link category-item swiper-slide">
                            <img src="/icons/computer.svg" class="icon-category" alt="Category Thumbnail">
                            <h3 class="category-title">Komputer</h3>
                        </a>
                        <a href="index.html" class="nav-link category-item swiper-slide">
                            <img src="/icons/printer.svg" class="icon-category" alt="Category Thumbnail">
                            <h3 class="category-title">Printer</h3>
                        </a>
                        <a href="index.html" class="nav-link category-item swiper-slide">
                            <img src="/icons/cctv.png" class="icon-category" alt="Category Thumbnail">
                            <h3 class="category-title">CCTV</h3>
                        </a>
                        <a href="index.html" class="nav-link category-item swiper-slide">
                            <img src="/icons/accesories.png" class="icon-category" alt="Category Thumbnail">
                            <h3 class="category-title">Aksesoris</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-3">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                <div class="bootstrap-tabs product-tabs">
                    <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                        <h3>Trending Products</h3>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                                <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab" data-bs-toggle="tab" data-bs-target="#nav-fruits">Fruits & Veges</a>
                                <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab" data-bs-toggle="tab" data-bs-target="#nav-juices">Juices</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">

                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-biscuits.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-cucumber.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-milk.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-biscuits.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">
                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-cucumber.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-milk.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">
                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">
                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-biscuits.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- / product-grid -->

                        </div>

                        <div class="tab-pane fade" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">

                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-cucumber.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-milk.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-orange-juice.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-raspberries.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- / product-grid -->

                        </div>
                        <div class="tab-pane fade" id="nav-juices" role="tabpanel" aria-labelledby="nav-juices-tab">

                            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-cucumber.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-milk.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-tomatoes.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-tomatoketchup.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="product-item">

                                        <figure>
                                            <a href="index.html" title="Product Title">
                                                <img src="/images/produk/thumb-bananas.png" class="tab-image">
                                            </a>
                                        </figure>
                                        <h3>Sunstar Fresh Melon Juice</h3>
                                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                                                <use xlink:href="#star-solid"></use>
                                            </svg> 4.5</span>
                                        <span class="price">$18.00</span>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <a href="#" class="btn btn-outline-primary">Pesan <iconify-icon icon="uil:shopping-cart"></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- / product-grid -->

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection