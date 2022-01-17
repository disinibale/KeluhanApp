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

    <div class="card">
        <div class="card-header">
            Laporan Sistem Informasi
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Data Laporan</th>
                            <th>Jumlah Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-bold">Data Pelanggan</td>
                            <td>{{ $customers->count() }}</td>
                            <td><a href="{{route('customers.download')}}" class="btn btn-primary"><i class="fas fa-download"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Data Teknisi</td>
                            <td>{{ $technicians->count() }}</td>
                            <td><a href="{{route('technicians.download')}}" class="btn btn-primary"><i class="fas fa-download"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Data Keluhan</td>
                            <td>{{$complaints->count()}}</td>
                            <td><a href="{{route('complaints.download')}}" class="btn btn-primary"><i class="fas fa-download"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Data Keluhan Yang Belum Diproses</td>
                            <td>{{$complaints->where('status', 'unprocessed')->count()}}</td>
                            <td><a href="{{route('unprocessedComplaints.download')}}" class="btn btn-primary"><i class="fas fa-download"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Data Perbaikan Yang Sedang Diproses</td>
                            <td>{{$repairement->count()}}</td>
                            <td><a href="{{route('processedComplaints.download')}}" class="btn btn-primary"><i class="fas fa-download"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-bold">Data Hasil Perbaikan</td>
                            <td>{{$complaints->where('status', 'completed')->count()}}</td>
                            <td><a href="{{route('repairements.download')}}" class="btn btn-primary"><i class="fas fa-download"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection