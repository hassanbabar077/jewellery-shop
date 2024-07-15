@extends('admin.layout.layout')

@section('page-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (empty($record['id']))
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>Create a New Product</h4>
        @else
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>Update a Product</h4>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    @if (empty($record['id']))
                        <h5 class="card-header">Create a New Product</h5>
                    @else
                        <h5 class="card-header">Update a Product</h5>
                    @endif
                    <div class="card-body">
                        <form role="form"
                            @if (empty($record['id'])) action="{{ route('create.products') }}" @else action="{{ route('create.products', $record['id']) }}" @endif
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
                                    <label for="author">Content<span class="text-danger">*</span></label>
                                    <input type="text" name="content" value="{{ $record['content'] }}"
                                        class="form-control" notrequired>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">loction<span class="text-danger">*</span></label>
                                    <input type="text" name="loction" value="{{ $record['loction'] }}"
                                        class="form-control" notrequired>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">Category<span class="text-danger">*</span></label>
                                    <input type="text" name="category" value="{{ $record['category'] }}"
                                        class="form-control" notrequired>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="rating">rating</label>
                                    <input type="text" name="rating" value="{{ $record['rating'] }}"
                                        class="form-control" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="author">Main Image<span class="text-danger">*</span></label>
                                    <input type="file" name="main_image"
                                        data-default-file="{{ asset('uploads/main-images/cars/' . $record['main_image']) }}"
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
