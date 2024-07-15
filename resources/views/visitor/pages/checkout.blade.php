@extends('visitor.layout.layout')
@section('page-content')
    <style>
        /* Custom CSS for form styling */
        .custom-form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('visitor-assets/imgs/home/pexels-adrian-dorobantu-2127733.jpg') }}" alt=""
                    style="height: 60vh" width="100%">
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <ul class="list-group border border-dark shadow p-3 mb-5 bg-white rounded">
                    <li class="list-group-item font-weight-bold">Total <span
                            class="text-danger fs-5">$</span>{{ $total }}</li>
                    <li class="list-group-item">Deliver Order in 6 to 7 days.</li>
                    <li class="list-group-item">Tax and other charges are included.</li>
                    <li class="list-group-item">No Hidden Charges.</li>
                </ul>
                <div class="container">
                    <h1 class="mt-5 mb-4">Cash on Delivery Form</h1>
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <form action="{{ route('cashOn.deliver') }}" method="post" class="custom-form">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter your phone number">
                                </div>
                                @if ($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter your phone number">
                                    @if ($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter your address">
                                    @if ($errors->has('address'))
                                        <div class="text-danger">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('exteraScript')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
