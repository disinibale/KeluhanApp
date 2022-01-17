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

        <div class="card ">
            <div class="card-header">{{ __('Data Keluhan') }}</div>


            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-sm mb-4">
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th>Nama Pelanggan</th>
                            <th>Keluhan</th>
                            <th>Teknisi</th>
                            <th>Tanggal Perbaikan</th>
                            <th>Tindakan</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $complain)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $complain->user->name }}</td>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:350px;">{{ $complain->message }}</td>
                                <td>{{ $complain->repairement->technician->fullname }}</td>
                                <td>{{ $complain->repairement->date }}</td>
                                <td>{{ $complain->repairement->actions }}</td>
                                <td class="text-warning">{{ strtoupper($complain->status) }}</td>
                                <th class="d-flex flex-row justify-content-center">
                                    <a href="{{ route('complaint.show', $complain->id) }}" class="btn btn-tooltip btn-success mr-2" data-toggle="tooltip" data-placement="top" title="Lihat Data Keluhan">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('complaint.result', $complain->id) }}" class="btn btn-tooltip btn-danger mr-2" data-toggle="tooltip" data-placement="top" title="Kirim Hasil Perbaikan">
                                        <i class="fas fa-check"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $complaints->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
@endsection

@section('js')
    <script>
        $('.btn-tooltip').tooltip()
    </script>
@endsection
