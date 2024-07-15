@extends('visitor.layout.layout')
@section('page-content')
    <div class="container-fluid bg-serviceproducts d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="text-center text-white">Shop</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid new-car-section" id="jewelrySection"> <!-- Added id attribute -->
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin-top: 90px;">
                    <h2>jewelry</h2>
                </div>
                
            <form class="row g-3" method="GET" action="{{ route('jewellery.shop') }}">
                <div class="col-auto">
                  <label for="search" class="visually-hidden">Search</label>
                  <input type="text" class="form-control" id="search" placeholder="Search" name="search"value="{{ request()->search }}">
                </div>
                <div class="col-auto">
                  <button type="submit" class="btn btn-primary mb-3">Search</button>
                </div>
              </form>
                <div class="row">
                @foreach ($record as $data)
                    @if ($data->category == 'new')
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch">
                            <div class="card why-service-card mt-4 bg-gray">
                                <img src="{{ asset('uploads/main-images/cars/' . $data->main_image) }}" alt=""
                                    class="img-fluid">
                                <div class="d-flex mt-3 justify-content-around">
                                    <div class="col-5">Rating: <span class="fw-bold text-danger"><i
                                                class="fa-solid fa-star"></i></span>{{ $data->rating }}</div>
                                    <div class="col-5 d-flex justify-content-end">Price : <span
                                            class="fw-bold text-danger">${{ $data->price }}</span></div>
                                </div>
                                <div class="card-body d-flex flex-column align-items-start">
                                    <h3 class="text-danger">{{ $data->title }}</h3>
                                    <p href="#" class="mt-auto text-dark w-100">{{ $data->content }}</p>
                                    <livewire:add-to-cart :dataId="$data">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid new-car-section">
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin-top: 90px;">
                    <h2>Upcoming jewelry</h2>
                </div>
                @foreach ($record as $data)
                    @if ($data->category == 'upcoming')
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch ">
                            <div class="card why-service-card mt-4 bg-gray">
                                <img src="{{ asset('uploads/main-images/cars/' . $data->main_image) }}" alt=""
                                    class="img-fluid">
                                <div class="d-flex mt-3 justify-content-around">
                                    <div class="col-5">Rating: <span class="fw-bold text-danger"><i
                                                class="fa-solid fa-star"></i></span>{{ $data->rating }}</div>
                                    <div class="col-5 d-flex justify-content-end">Price : <span
                                            class="fw-bold text-danger">Upcoming</span></div>
                                </div>
                                <div class="card-body d-flex flex-column align-items-start">
                                    <h3 class="text-danger">{{ $data->title }}</h3>
                                    <p href="#" class="mt-auto text-dark w-100">{{ $data->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
