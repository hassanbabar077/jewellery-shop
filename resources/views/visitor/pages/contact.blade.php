@extends('visitor.layout.layout')
@section('page-content')
    <div class="conatiner-fluid bg-service d-flex align-items-center justify-content-center">
        <div class="row ">
            <div class="col-12 ">
                <h1 class="text-white">Contact Us</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109120.74557684673!2d72.2535638704135!3d31.275450731667075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3923a2a1b138cbc3%3A0xded4c1b9259211a1!2sJhang%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1692015254394!5m2!1sen!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <div class="container-fluid  d-flex align-items-center bg-contact-img">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="box col-lg-7">
                    <h2>Query</h2>
                    <form action="{{ route('query') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="inputBox">
                            <input type="text" name="name">
                            <label for>Name</label>
                            @if ($errors->has('name'))
                                <div class="text-white">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email">
                            <label for>Email</label>
                        </div>
                        @if ($errors->has('email'))
                            <div class="text-white">{{ $errors->first('email') }}</div>
                        @endif
                        <div class="inputBox">
                            <input type="tel" name="phonenumber">
                            <label for>Phone no</label>
                        </div>
                        @if ($errors->has('phonenumber'))
                            <div class="text-white">{{ $errors->first('phonenumber') }}</div>
                        @endif
                        <div class="inputBox">
                            <textarea type="text" name="address" cols="3" rows="3"></textarea>
                            <label for>Address</label>
                        </div>
                        @if ($errors->has('address'))
                            <div class="text-white">{{ $errors->first('address') }}</div>
                        @endif
                        <div class="inputBox">
                            <textarea type="text" name="query" cols="10" rows="7"></textarea>
                            <label for>Query</label>
                        </div>
                        @if ($errors->has('query'))
                            <div class="text-white">{{ $errors->first('query') }}</div>
                        @endif
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
