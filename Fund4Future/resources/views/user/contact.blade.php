@extends('layouts.user')
@section('title')
    Contact Us
@endsection
@section('content')
    <div style="background-image: url('img/BgImgContactUs.jpg');">
        <div class="mask" style="background-color: rgba(255, 255, 255, 0.65)">
            <br>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h1>Contact Us</h1>
                        <br>
                        <h3>Address</h3>
                        <br>
                        <p>
                        8, Jl. Rw. Belong No.82B, RT.9/RW.15, Palmerah, 
                        Kec. Palmerah, Kota Jakarta Barat, Daerah 
                        Khusus Ibukota Jakarta 11480
                        </p>
                        <br>
                        <br>
                        <h3>Opening Hours</h3>
                        <br>
                        <p>Mon - Fri:</p>
                        <p>9 AM - 5 PM</p>
                        <br>
                        <p>Sat - Sun</p>
                        <p>11 AM - 3 Pm</p>
                        <br>
                        <p>+6285169690420</p>
                        <p>fund4future@gmail.com</p>
                    </div>
                    <div class="col-sm"></div>
                    <div class="col-sm">
                        <form>
                            <div class="form-group">
                                <label for="InputFirstName">First Name *</label>
                                <input type="Name" class="form-control" id="InputFirstName" placeholder="First Name" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="InputLastName">Last Name *</label>
                                <input type="Name" class="form-control" id="InputLastName" placeholder="Last Name" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="InputEmail">Email *</label>
                                <input type="Email" class="form-control" id="InputEmail" placeholder="Input Email" required>
                            </div>
                            <br>
                            <div>
                            <label for="InputMessage">Message</label>
                            <textarea class="form-control" id="InputMessage" row="5" placeholder="Input Message"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">submit</button>
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Halaman untuk Contact us user, kalau user masukin kolomnya dan submit akan masuk ke database mail --}}
