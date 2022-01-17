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
            <div class="card-header">{{ __('Data Pelanggan') }}</div>


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
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $customer->user->name }}</td>
                                <td>{{ $customer->user->email }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->phone }}</td>
                                <th class="d-flex flex-row justify-content-center">
                                    <a href="{{ route('customer.show', $customer->id) }}" class="btn btn-success mr-2">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form class="none" action="{{ route('customer.destroy', $customer->id) }}" method="POST">
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

                {{ $customers->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    


@endsection
