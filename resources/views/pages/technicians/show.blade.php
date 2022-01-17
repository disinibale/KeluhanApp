@extends('layouts.lte')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Lihat Data Pelanggan') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('technicians.update', $technicians->id) }}">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" name="user_id" value="{{$customer->id}}"> --}}
                <div class="table-responsive">
                    <table class="table">
                        {{-- <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Informasi</th>
                                    </tr>
                                </thead> --}}
                        <tbody>
                            <tr>
                                <td>Nama Teknisi</td>
                                {{-- <td>{{ $customer->user->name }}</td> --}}
                                <td>
                                    <input type="text" class="form-control" name="fullname" value="{{ $technicians->fullname }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Email Teknisi</td>
                                {{-- <td>{{ $customer->user->email }}</td> --}}
                                <td>
                                    <input type="text" class="form-control" name="email" value="{{ $technicians->email }}">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control" name="address" required>{{ $technicians->address }}</textarea>                                
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>
                                    <input type="text" class="form-control" name="phone" value="{{ $technicians->phone }}">                                
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary mr-2">
                        Edit Pelanggan <i class="fas fa-fw fa-edit"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

@endsection
