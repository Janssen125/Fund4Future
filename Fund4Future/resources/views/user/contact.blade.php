@extends('layouts.user')
@section('title')
    Contact Us
@endsection
@section('content')
    <section class="dvw-100 dvh-100 position-relative d-flex justify-content-center align-items-center">
        <div class="dvw-100 position-absolute top-0 start-0 z-n1">
            <img src="{{ asset('img/BgImgContactUs.jpg') }}" alt="Background" srcset="" class="section-background-size">
        </div>
        <div class="p-5 bg-container-transparent rounded-5">
            <div class="container">
                <div class="row">
                    <h1>Contact Us</h1>
                    <div class="col flex-column d-flex justify-content-around">
                        <div>
                            <h3>Address</h3>
                            <p>
                                8, Jl. Rw. Belong No.82B, RT.9/RW.15, Palmerah,
                                Kec. Palmerah, Kota Jakarta Barat, Daerah
                                Khusus Ibukota Jakarta 11480
                            </p>
                        </div>
                        <div>
                            <h3>
                                Social Media
                            </h3>
                            <p>
                                {{-- Nanti ini tinggal dikasih logo aja --}}
                                <a href="#">
                                    {{-- gambar1 --}}
                                    <img src="" alt="" srcset="">
                                </a>
                                <a href="#">
                                    {{-- gambar2 --}}
                                    <img src="" alt="" srcset="">
                                </a>
                                <a href="#">
                                    {{-- gambar3 --}}
                                    <img src="" alt="" srcset="">
                                </a>
                            </p>
                        </div>
                        <div>
                            <h3>Opening Hours</h3>
                            <p><b>Mon - Fri:</b>
                                9 AM - 5 PM<br>
                                <b>Sat - Sun:</b>
                                11 AM - 3 Pm<br>
                            </p>
                        </div>
                        <div>
                            <h3>Phone Number</h3>
                            <p>
                                +6285169690420
                            </p>
                        </div>
                        <div>
                            <h3>Mail</h3>
                            <p>fund4future@gmail.com</p>
                        </div>
                    </div>
                    <div class="col-sm">
                        <form>
                            <div class="form-group py-3">
                                <label for="InputFirstName">First Name *</label>
                                <input type="Name" class="form-control" id="InputFirstName" placeholder="First Name"
                                    required>
                            </div>
                            <div class="form-group py-3">
                                <label for="InputLastName">Last Name *</label>
                                <input type="Name" class="form-control" id="InputLastName" placeholder="Last Name"
                                    required>
                            </div>
                            <div class="form-group py-3">
                                <label for="InputEmail">Email *</label>
                                <input type="Email" class="form-control" id="InputEmail" placeholder="Input Email"
                                    required>
                            </div>
                            <div class="form-group py-3">
                                <label for="InputMessage">Message</label>
                                <textarea class="form-control" id="InputMessage" row="5" placeholder="Input Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- Halaman untuk Contact us user, kalau user masukin kolomnya dan submit akan masuk ke database mail --}}
