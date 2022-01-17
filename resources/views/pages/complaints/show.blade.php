@extends('layouts.lte')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Proses Keluhan Pelanggan') }}</div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>
                                <input type="text" name="fullname" placeholder="Nama Lengkap" class="form-control"
                                    value="{{ $complaint->user->name }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Pelanggan</td>
                            <td>
                                <input type="text" name="email" placeholder="Email" class="form-control"
                                    value="{{ $complaint->user->email }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <textarea class="form-control" name="address" required placeholder="Alamat"
                                    disabled>{{ $complaint->user->customer->address }}"</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Keluhan</td>
                            <td>
                                <textarea disabled class="form-control">{{ $complaint->message }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Teknisi Yang Di Kerahkan</td>
                            <td>
                                <input type="text" class="form-control" name="date" value="{{ $complaint->repairement->technician->fullname }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Perbaikan</td>
                            <td>
                                <input type="text" class="form-control" name="date" id="tanggal-perbaikan" value="{{ $complaint->repairement->date }}" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Aksi</td>
                            <td>
                                <textarea disabled type="text" class="form-control" name="action"
                                    placeholder="Aksi yang akan dilakukan">{{$complaint->repairement->actions}}</textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection
