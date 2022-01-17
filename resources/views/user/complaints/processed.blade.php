@extends('layouts.lte')

@section('content')

    @if (session('success'))
        <div class="alert alert-success mb-3">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($complaints->isEmpty())
        <div class="callout callout-danger">
            <h4>Perhartian</h4>
            <p>Anda harus melakukan verifikasi data pelanggan dengan mengisi informasi anda</p>
            <button class="btn btn-danger text-decoration-none" data-toggle="modal" data-target="#customerModal">Isi
                Informasi Anda</button>
        </div>
    @else
        <div class="card ">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <b>
                        {{ __('Data Keluhan Yang Sedang Diproses') }}
                    </b>
                </div>
                {{-- <div> --}}
                {{-- </div> --}}

                {{-- <div class="float-right"> --}}
                {{-- </div> --}}
            </div>

            <div class="card-body">

                @if ($complaints->isEmpty())
                    <div class="callout callout-success">
                        <h4 class="alert-heading">Oops...</h4>
                        Sepertinya data keluhan anda belum diproses atau sudah diperbaiki, Tekan tombol dibawah untuk membuat pesan keluhan yang baru<br>
                        <a class="mt-3 text-decoration-none text-light btn btn-success" href="{{ route('user.complaints.index') }}">
                            Kirim Keluhan Anda
                        </a>
                    </div>
                @else
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th>Keluhan Anda</th>
                                <th>Teknisi</th>
                                <th>Tanggal Perbaikan</th>
                                <th>Tindakan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $complaint->message }}</td>
                                    <td>{{ $complaint->repairement->technician->fullname }}</td>
                                    <td>{{ $complaint->repairement->date }}</td>
                                    <td>{{ $complaint->repairement->actions }}</td>
                                    <td class="text-warning">{{ strtoupper($complaint->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $complaints->links('vendor.pagination.bootstrap-4') }}

                @endif

            </div>
        </div>

    @endif

@endsection
