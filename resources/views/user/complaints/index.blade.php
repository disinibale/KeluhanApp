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

    @if (empty($customers))
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
                        {{ __('Data Keluhan Anda') }}
                    </b>

                    @if ($complaints->isNotEmpty())
                        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#complaintForm">Buat
                            Keluhan &nbsp;<i class="fas fa-plus"></i></button>
                    @endif
                </div>
                {{-- <div> --}}
                {{-- </div> --}}

                {{-- <div class="float-right"> --}}
                {{-- </div> --}}
            </div>

            <div class="card-body">

                @if ($complaints->isEmpty())
                    <div class="callout callout-success">
                        <h4 class="alert-heading">Anda Belum Memiliki Data Keluhan</h4>
                        Anda belum mengirimkan pesan keluhan kepada Telkom Indonesia atau keluhan anda sudah diproses, untuk mengirimkan pesan keluhan silahkan
                        pilih menu dibawah ini <br>
                        <button class="mt-3 text-decoration-none text-light btn btn-success" data-toggle="modal"
                            data-target="#complaintForm">Kirim Keluhan Anda</button>
                    </div>
                @else
                    <table class="table mb-4">
                        <thead>
                            <tr>
                                <th scope="row">#</th>
                                <th>Keluhan Anda</th>
                                <th>Tanggal Kirim</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaints as $complaint)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $complaint->message }}</td>
                                    <td>{{ $complaint->created_at }}</td>
                                    <td class="text-danger">{{ strtoupper($complaint->status) }}</td>
                                    <th class="d-flex flex-row justify-content-center">
                                        <a href="{{ route('user.complaints.show', $complaint->id) }}"
                                            class="btn btn-success mr-2">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form class="none"
                                            action="{{ route('user.complaints.dstroy', $complaint->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $complaints->links('vendor.pagination.bootstrap-4') }}

                @endif

            </div>
        </div>

    @endif


    <div class="modal fade" id="complaintForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Keluhan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('user.complaints.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kirim pesan keluhan anda :</label>
                            <textarea name="message" class="form-control" placeholder="Isi Keluhan Anda Disini"
                                rows="20"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Kirim Pesan <i class="far fa-fw fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (empty($customers))
        <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Isi Data Informasi Diri Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('user.customers.store') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="address" class="form-control" placeholder="Alamat" rows="20"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                Kirim Pesan <i class="far fa-fw fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


@endsection
