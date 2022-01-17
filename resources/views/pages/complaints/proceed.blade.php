@extends('layouts.lte')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Proses Keluhan Pelanggan') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('repair.store', $complaint->id) }}">
                @csrf
                <div class="table-responsive">
                    <table class="table">
                        <input type="hidden" value="{{ $complaint->id }}">
                        <tbody>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>
                                    <input type="text" name="fullname" placeholder="Nama Lengkap" class="form-control" value="{{ $complaint->user->name }}" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Pelanggan</td>
                                <td>
                                    <input type="text" name="email" placeholder="Email" class="form-control" value="{{ $complaint->user->email }}" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>
                                    <textarea class="form-control" name="address" required placeholder="Alamat" disabled>{{ $complaint->user->customer->address }}"</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Keluhan</td>
                                <td>
                                    <textarea class="form-control" disabled>{{ $complaint->message }}</textarea>                            
                                </td>
                            </tr>
                            <tr>
                                <td>Teknisi Yang Di Kerahkan</td>
                                <td>
                                    <select class="form-control" id="pilih-teknisi" name="technician" style="width: 100%; width:38px">
                                        @foreach ($technicians as $teknisi)
                                            <option value="{{$teknisi->id}}">{{$teknisi->fullname}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Perbaikan</td>
                                <td>
                                    <input type="text" class="form-control" name="date" id="tanggal-perbaikan">
                                </td>
                            </tr>
                            <tr>
                                <td>Aksi</td>
                                <td>
                                    <textarea type="text" class="form-control" name="action" placeholder="Aksi yang akan dilakukan"></textarea>                           
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-success mr-2">
                        Proses Keluhan <i class="fas fa-fw fa-sign-in-alt"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

@endsection

{{-- @section('js')
    
@endsection --}}

{{-- @section('plugins.Select2', true)
    <script>
        $(document).ready(function() {
            $('#pilih-teknisi').select2();
        })
    </script>
@endsection --}}