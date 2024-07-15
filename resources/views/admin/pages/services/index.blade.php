@extends('admin.layout.layout')

@section('page-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12 d-flex justify-content-around align-content-center">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>List of Services</h4>
            <div class="">
                <a href="{{ route('create.services') }}" class="btn btn-success">Add Service</a>
            </div>
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
                    <h5 class="card-header">List of Services</h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Body Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($record as $data)
                                        <tr>
                                            {{-- @php
                                                dd($record);
                                            @endphp --}}
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <img src="{{ asset('uploads/service-images/' . $data->image) }}"
                                                    alt="not-found" width="100px" height="100px">
                                            </td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->content }}</td>
                                            <td> {{ $data->price }}</td>
                                            <td> {{ $data->body_type }}</td>
                                            <td>
                                                <a href="{{ route('create.services', $data['id']) }}" class="me-3"><i
                                                        class='bx bx-edit-alt'></i></a>
                                                <a href="{{ route('delete.services', $data['id']) }}" class="me-3">
                                                    <i class='bx bx-trash-alt'></i></a>
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
    @foreach ($record as $data)
        <div class="modal fade" id="notification-details-{{ $data->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-5 px-sm-5 pt-50">
                        <div class="text-center mb-2">
                            <h1 class="mb-1">Hafiz Details</h1>
                            <p>IT Centre Rahim Yar Khan</p>
                            <img src="{{ $data->image }}" class="img-fluid rounded float-left" width="200"
                                alt="">
                        </div>
                        <div class="row gy-1 pt-75">
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Title</label>
                                <div class="fw-bolder">{{ $data->title ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Model</label>
                                <div class="fw-bolder">{{ $data->model ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">CD Player</label>
                                <div class="fw-bolder">{{ $data->cd_player ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Category</label>
                                <div class="fw-bolder">{{ $data->category ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Price</label>
                                <div class="fw-bolder">{{ $data->price ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Color</label>
                                <div class="fw-bolder">{{ $data->color ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Body Type</label>
                                <div class="fw-bolder">{{ $data->body_type ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Loction</label>
                                <div class="fw-bolder">{{ $data->loction ?? '' }}</div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label" for="jobTitle">Content</label>
                                <div class="fw-bolder">{{ $data->content ?? '' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
