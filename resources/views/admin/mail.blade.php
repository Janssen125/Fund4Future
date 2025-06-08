@extends('layouts.admin')
@section('title')
    Mail List
@endsection
@section('cssName')
    admindasboard
@endsection
@section('content')
    <div class="container mt-4">
        <h2>List Mail</h2>
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th>1</th>
                        <td>2025-1-3</td>
                        <td>Udin</td>
                        <td>laporan pengalangan dana</td>
                        <td><a href="">Detail</a></td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>2025-3-15</td>
                        <td>Condoriano</td>
                        <td>Pengajuan penggalangan dana</td>
                        <td><a href="">Detail</a></td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>2025-4-30</td>
                        <td>Suprianto</td>
                        <td>Pertanyaan tentang penggalangan dana</td>
                        <td><a href="">Detail</a></td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection

{{-- Halaman untuk daftar pesan dari contact us, bisa Create, Read, Update. Delete cuma bisa si Admin --}}
