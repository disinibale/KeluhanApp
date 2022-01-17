@extends('layouts.lte')

@section('content')
    <div class="card mb-2">
        {{-- <div class="card-header">{{ __('Proses Keluhan Pelanggan') }}</div> --}}

        {{-- <div class="card-body"> --}}
        <form action="{{ route('repairResult.store', $complaint->id) }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" colspan="2"> # Data Keluhan Pelanggan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold">Nama Pelanggan</td>
                            <td>
                                <input type="text" name="fullname" placeholder="Nama Lengkap" class="form-control"
                                    value="{{ $complaint->user->name }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Nomor Pelanggan</td>
                            <td>
                                <input type="text" name="email" placeholder="Email" class="form-control"
                                    value="{{ $complaint->user->email }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Alamat</td>
                            <td>
                                <textarea class="form-control" name="address" required placeholder="Alamat"
                                    disabled>{{ $complaint->user->customer->address }}"</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Keluhan</td>
                            <td>
                                <textarea disabled class="form-control">{{ $complaint->message }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center"># Data Perbaikan Yang Diajukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold">Teknisi Yang Di Kerahkan</td>
                            <td>
                                <input type="text" class="form-control" name="date"
                                    value="{{ $complaint->repairement->technician->fullname }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Tanggal Perbaikan</td>
                            <td>
                                <input type="text" class="form-control" name="date" id="tanggal-perbaikan"
                                    value="{{ $complaint->repairement->date }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Aksi</td>
                            <td>
                                <textarea disabled type="text" class="form-control" name="action"
                                    placeholder="Aksi yang akan dilakukan">{{ $complaint->repairement->actions }}</textarea>
                            </td>
                        </tr>
                    </tbody>
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" colspan="2">Laporan Perbaikan Teknisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold">Tanggal Selesai</td>
                            <td>
                                <input id="tanggal-selesai" type="text" name="finish_date" placeholder="Tanggal selesai" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-bold">Hasil Perbaikan</td>
                            <td>
                                <textarea rows="8" name="results" class="form-control"
                                    placeholder="Hasil Perbaikan"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="container-flex mr-2 mb-5">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Kirim Hasil Perbaikan</button>
                </div>
            </div>

        </form>
        {{-- </div> --}}
    </div>

@endsection
