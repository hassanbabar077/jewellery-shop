@extends('admin.layout.layout')

@section('page-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 d-flex justify-content-around align-content-center">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>List of Query</h4>
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
                    <h5 class="card-header">List of Query</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($query as $data)
                                        <tr>
                                        
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td> {{ $data->phonenumber }}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#notification-details-{{ $data->id }}"
                                                    title="View Detail">
                                                    <i class='bx bx-selection'></i>
                                                </a>
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
    @foreach ($query as $data)
        <div class="modal fade" id="notification-details-{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Query Details</h1>
                            <p>Car Gallery and Service Center</p>
                            <img src="{{ asset('uploads/main-images/cars/' . $data->main_image) }}" class="img-fluid rounded float-left" width="200"
                                alt="">
                        </div>
                        <div class="row gy-1 pt-75">
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Name</label>
                                <div class="fw-bolder">{{ $data->name ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Email</label>
                                <div class="fw-bolder">{{ $data->email ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Phone no</label>
                                <div class="fw-bolder">{{ $data->phonenumber ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">query</label>
                                <div class="fw-bolder">{{ $data->query ?? '' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
