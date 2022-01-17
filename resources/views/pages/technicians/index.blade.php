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
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>Data Teknisi</div>
                    <a href="{{ route('technicians.create') }}" class="btn btn-primary">Tambah Teknisi</a>
                </div>
            </div>


            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table mb-4">
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th>Nama Teknisi</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technicians as $teknisi)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $teknisi->fullname }}</td>
                                <td>{{ $teknisi->email }}</td>
                                <td>{{ $teknisi->address }}</td>
                                <td>{{ $teknisi->phone }}</td>
                                <th class="d-flex flex-row justify-content-center">
                                    <a href="{{ route('technicians.show', $teknisi->id) }}" class="btn btn-success mr-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form class="none" action="{{ route('technicians.destroy', $teknisi->id) }}" method="POST">
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

                {{ $technicians->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    


@endsection
