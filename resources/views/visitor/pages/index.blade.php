@extends('visitor.layout.layout')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="slider-item"
                            style="background-image: url('{{ asset('visitor-assets/imgs/home/1.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="content">
                                <h2 class="slideInRight">jewelry Shop</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora deleniti accusamus
                                    maiores blanditiis nostrum, quod mollitia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slider-item"
                            style="background-image: url('{{ asset('visitor-assets/imgs/home/2.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="content">
                                <h2 class="slideInRight">jewelry Shop</h2>
                                <p>Lorem ipsum dolor sit amet. ipsum dolor, sit amet consectetur adipisicing elit. Sapiente,
                                    nihil.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slider-item"
                            style="background-image: url('{{ asset('visitor-assets/imgs/home/3.jpg') }}');">
                            <div class="overlay"></div>
                            <div class="content">
                                <h2>jewelry Shop</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur laudantium laborum,
                                    dolore molestias perferendis eius dolorem temporibus qui in? Laborum!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start offer service -->
    {{-- <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center fw-bold display-6">What We <span class="text-danger">Offers</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch text-center">
                <div class="card why-service-card mt-4 bg-gray">
                    <div class="card-head d-flex justify-content-center">
                        <span class="mt-4 bg-danger why-serviceicon"><i class="fas fa-shopping-cart fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-danger">Fast delivery</h3>
                        <p href="#" class=" mt-auto ">
                            We prioritize fast delivery to ensure your car
                            reaches you promptly and efficiently, providing
                            a convenient and timely service for your
                            convenience.</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 d-flex align-items-stretch text-center">
                <div class="card why-service-card  mt-4 bg-gray">
                    <div class="card-head d-flex justify-content-center">
                        <span class="mt-4 bg-danger  why-serviceicon"><i class="fas fa-car fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-danger">Multi-brand Showroom</h3>
                        <p href="#" class=" mt-auto ">
                            Our car inventory includes diverse options,
                            catering to different tastes and requirements,
                            ensuring a satisfying selection process for
                            every customer.</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 d-flex align-items-stretch text-center">
                <div class="card why-service-card mt-4 bg-gray">
                    <div class="card-head d-flex justify-content-center">
                        <span class="mt-4 bg-danger  why-serviceicon"><i class="fas fa-tools fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-danger">Auto Maintenance</h3>
                        <p href="#" class=" mt-auto ">Proper auto
                            maintenance is crucial for the longevity and
                            efficiency of your vehicle, ensuring optimal
                            performance, safety, and peace of mind on the
                            road.</p>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- end offer service -->
    <!-- Counter section start -->
    <div class="container-fluid bg-counter py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="counter col-6 col-md-4 text-center">
                    <i class="fas fa-truck-loading fa-2x text-danger"></i>
                    <h2 class="timer count-title count-number" data-to="11000" data-speed="1500"></h2>
                    <p class="count-text">Delivery</p>
                </div>

                {{-- <div class="counter col-6 col-md-3 text-center">
                    <i class="fas fa-shopping-cart fa-2x text-danger"></i>
                    <h2 class="timer count-title count-number" data-to="100" data-speed="1500"></h2>
                    <p class="count-text">Order</p>
                </div> --}}

                <div class="counter col-6 col-md-4 text-center">
                    <i class="fas fa-dollar-sign fa-2x text-danger"></i>
                    <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
                    <p class="count-text">Sales</p>
                </div>

                <div class="counter col-6 col-md-4 text-center">
                    <i class="fas fa-car fa-2x text-danger"></i>
                    <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
                    <p class="count-text">Happy Clients</p>
                </div>
            </div>
        </div>
    </div>
    <!--Counter section end  -->
    <!-- New arrivals start-->
    <div class="container-fluid bg-new-arrivals py-5 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-white" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Best Jewellery Shop</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, blanditiis! Necessitatibus,
                        similique vel aut tempore rerum provident laboriosam delectus repellat ab, distinctio quas
                        exercitationem atque debitis ullam praesentium? Quia, excepturi.</p>
                    <a href="#" class="btn bg-danger text-white">Shop Now</a>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
    </div>
    <!-- Endarrivals start-->
    <!-- Recent Clients Section -->
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="deal-section fw-bold display-6"><span class="text-danger">J</span>ewellery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    <div class="owl-carousel custom-owl-slider">
                        <!-- Slide content goes here -->
                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/1.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>

                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/2.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>
                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/3.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>
                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/4.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>
                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/5.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>
                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/6.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>

                        <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/7.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>
                        <div class="item">

                            <img src="{{ asset('visitor-assets/imgs/deal-logo/8.jpg') }}" class="card-img-top"
                                alt="Image">
                        </div>
                        {{-- <div class="item">
                            <img src="{{ asset('visitor-assets/imgs/deal-logo/18.png') }}" class="card-img-top"
                                alt="Image">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Recent Clients Section -->
@endsection
