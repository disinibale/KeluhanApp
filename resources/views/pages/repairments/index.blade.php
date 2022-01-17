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
            <div class="card-header">{{ __('Data Perbaikan') }}</div>


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
                            <th>Tanggal Selesai</th>
                            <th>Tindakan</th>
                            <th>Hasil Perbaikan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repairements as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->repairement->complain->user->name }}</td>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:350px;">{{ $r->repairement->complain->message }}</td>
                                <td>{{ $r->repairement->technician->fullname }}</td>
                                <td>{{ $r->repairement->date }}</td>
                                <td>{{ $r->finish_date }}</td>
                                <td>{{ $r->repairement->actions }}</td>
                                <td>{{ $r->result }}</td>
                                <td class="text-success">{{ strtoupper($r->repairement->complain->status) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $repairements->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
@endsection

@section('js')
    <script>
        $('.btn-tooltip').tooltip()
    </script>
@endsection
