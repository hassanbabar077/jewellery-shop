@extends('admin.layout.layout')

@section('page-content')

  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <!-- Total Revenue -->

      <!--/ Total Revenue -->
      <div class="col-12 col-md-8 col-lg-12 order-3 order-md-2">
        <div class="row">
            <!-- Total Revenue -->

            <!--/ Total Revenue -->
            <div class="col-12 col-md-8 col-lg-12 order-3 order-md-2 py-2">
              <div class="row">

              <div class="col-lg-3 py-2">
                  <div class="card">
                      <div class="card-head p-3">
                       <i class='bx bxs-cart-alt bx-lg'></i><span class="p-3 ">Total Products</span>
                      </div>
                      <div class="card-body">
                          <p>{{ $totalproduct }}</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 py-2">
                  <div class="card">
                      <div class="card-head p-3">
                         <i class='bx bx-user bx-lg'></i><span class="p-3 ">Total Users</span>
                      </div>
                      <div class="card-body">
                          <p>{{ $totalUser }}</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 py-2">
                  <div class="card">
                      <div class="card-head p-3">
                        <i class='bx bxs-data bx-lg'></i><span class="p-3 ">Total Order</span>
                      </div>
                      <div class="card-body">
                          <p>{{ $totalOrder }}</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 py-2">
                  <div class="card">
                      <div class="card-head p-3">
                          <i class='bx bxs-bank bx-lg'></i><span class="p-3 ">Total Revenue</span>
                      </div>
                      <div class="card-body">
                          <p>$ {{ $total_revenue }}</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 py-2">
                  <div class="card">
                      <div class="card-head p-3">
                          <i class='bx bx-check-square bx-lg'></i><span class="p-3 ">Total Order Delivered</span>
                      </div>
                      <div class="card-body">
                          <p>{{ $total_delivered }}</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-3 py-2">
                  <div class="card">
                      <div class="card-head p-3">
                          <i class='bx bxs-brightness-half bx-lg' ></i><span class="p-3 ">Total Order Processing</span>
                      </div>
                      <div class="card-body">
                          <p>{{  $total_processing }}</p>
                      </div>
                  </div>
              </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
