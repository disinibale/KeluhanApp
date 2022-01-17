@extends('layouts.lte')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Data Perbaikan
            </div>
            @if ($result->isEmpty())
                <div class="callout callout-danger">
                    <h4>Oops ...</h4>
                    <p>Keluhan anda belum ada yang diperbaiki, mohon tunggu hingga teknisi memperbaiki keluhan anda ...</p>
                </div>
            @else
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Keluhan</th>
                                <th>Teknisi</th>
                                <th>Tanggal Perbaikan</th>
                                <th>Tanggal Selesai</th>
                                <th>Tindakan</th>
                                <th>Hasil Perbaikan</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($result as $r)

                                @endforeach
                                <tr>
                                    <td>{{ $r->message }}</td>
                                    <td>{{ $r->repairement->technician->fullname }}</td>
                                    <td>{{ $r->repairement->date }}</td>
                                    <td>{{ $r->repairement->result->finish_date }}</td>
                                    <td>{{ $r->repairement->actions }}</td>
                                    <td>{{ $r->repairement->result->result }}</td>
                                    <td class="text-success">{{ strtoupper($r->status) }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{ $result->links('vendor.pagination.bootstrap-4') }}

                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
