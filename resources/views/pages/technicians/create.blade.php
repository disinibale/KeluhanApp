@extends('layouts.lte')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Tambah Data Teknisi') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('technicians.store') }}">
                @csrf
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
                                    <input type="text" name="fullname" placeholder="Nama Lengkap" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Email Teknisi</td>
                                {{-- <td>{{ $customer->user->email }}</td> --}}
                                <td>
                                    <input type="text" name="email" placeholder="Email" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control" name="address" required placeholder="Alamat"></textarea>                                
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>
                                    <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon">                                
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success mr-2">
                        Tambah Data <i class="fas fa-fw fa-plus"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

@endsection
