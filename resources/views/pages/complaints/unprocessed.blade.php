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
                            <th>Nomor Telepon</th>
                            <th>Alamat</th>
                            <th>Keluhan</th>
                            <th class="text-cemter">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complaints as $complain)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $complain->user->name }}</td>
                                <td>{{ $complain->user->customer->phone }}</td>
                                <td>{{ $complain->user->customer->address }}</td>
                                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:350px;">
                                    <span class="mr-3">{{ $complain->message }}</span>
                                </td>
                                <td class="text-danger">
                                    <span class="label">{{ strtoupper($complain->status) }}</span>
                                </td>
                                <th class="d-flex flex-row justify-content-center">
                                    <a href="{{ route('complaint.proceed', $complain->id) }}" class="btn btn-tooltip btn-success mx-3" data-toggle="tooltip" data-placement="top" title="Proses Keluhan">
                                        <i class="fas fa-fw fa-sign-in-alt"></i>
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
