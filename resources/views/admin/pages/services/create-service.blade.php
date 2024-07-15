@extends('admin.layout.layout')

@section('page-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>Create a New Service</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create a New Service</h5>
                    <div class="card-body">
                        <form role="form"
                            @if (empty($record['id'])) action="{{ route('create.services') }}" @else action="{{ route('create.services', $record['id']) }}" @endif
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="name">Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $record['title'] }}" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="name">Price<span class="text-danger">*</span></label>
                                    <input type="text" name="price" value="{{ $record['price'] }}" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">time<span class="text-danger">*</span></label>
                                    <input type="datetime" name="time" value="{{ $record['time'] }}" class="form-control"
                                        notrequired>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">Category<span class="text-danger">*</span></label>
                                    <input type="text" name="category" value="{{ $record['category'] }}" class="form-control"
                                        notrequired>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">description<span class="text-danger">*</span></label>
                                    <input type="text" name="description" 
                                        value="{{ $record['description'] }}" class="form-control" notrequired>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image"
                                        data-default-file="{{ asset('uploads/service-images/' . $record['image']) }}"
                                        class="dropify form-control " notrequired>
                                </div>
                                <!-- Add another form group here if needed -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn btn-secondary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
