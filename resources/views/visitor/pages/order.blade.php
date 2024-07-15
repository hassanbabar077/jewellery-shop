@extends('visitor.layout.layout')
@section('page-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('visitor-assets/imgs/home/order.jpg') }}" alt="" style="width: 100% ; height:60vh">
            </div>
        </div>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 d-flex justify-content-around align-content-center">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>List of Order</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <span class="text-success">{{ Session('success') }}</span>
                @endif

                @if (Session::has('error'))
                    <span class="text-danger">{{ Session::get('error') }}</span>
                @endif
                <div class="card mb-4">
                    <h5 class="card-header">List of Order</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User-Id</th>
                                        <th>ProductId</th>
                                        <th>Qunatity</th>
                                        <th>Price</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($orders as $data)
                                        <tr>
                                            <td>{{ $data->user_id }}</td>
                                            <td>{{ $data->showroom_id }}</td>
                                            <td> {{ $data->quantity }}</td>
                                            <td> $ {{ $data->amount }}</td>
                                            <td> {{ $data->payment_status }}</td>
                                            <td> {{ $data->delivery_status }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#notification-details-{{ $data->id }}"
                                                    title="View Detail">
                                                    <i class='bx bx-selection'></i>
                                                </a>
                                                @if ($data->delivery_status == 'processing')
                                                    <a class="btn btn-danger"
                                                        href="{{ route('visitor.cancelorder', $data->id) }}"
                                                        onclick="return confirm('Are you sure to cancel this order?')">Cancel
                                                        Order</a>
                                                @elseif ($data->delivery_status == 'you canceled the Order')
                                                    <p class="text-danger  rounded text-center p-2">Cancle Order</p>
                                                @else
                                                    <p class="text-primary rounded text-center p-2">Delievrd</p>
                                                @endif


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @foreach ($orders as $data)
        <div class="modal fade" id="notification-details-{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Order Details</h1>
                            <p>Car Gallery and Service Center</p>
                            <img src="{{ asset('uploads/main-images/cars/' . $data->main_image) }}"
                                class="img-fluid rounded float-left" width="200" alt="">
                        </div>
                        <div class="row gy-1 pt-75">
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">User-Id</label>
                                <div class="fw-bolder">{{ $data->user_id ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Product-id</label>
                                <div class="fw-bolder">{{ $data->showroom_id ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Name</label>
                                <div class="fw-bolder">{{ $data->name ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Phone</label>
                                <div class="fw-bolder">{{ $data->phone ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Color</label>
                                <div class="fw-bolder">{{ $data->color ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Quantity</label>
                                <div class="fw-bolder">{{ $data->quantity ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Amount</label>
                                <div class="fw-bolder">{{ $data->amount ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Address</label>
                                <div class="fw-bolder">{{ $data->address ?? '' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
