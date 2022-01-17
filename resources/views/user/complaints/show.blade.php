@extends('layouts.lte')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Lihat Data Keluhan Anda') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('user.complaints.update', $complaint->id) }}">
                @csrf
                @method('PUT')

                <div class="table-responsive">
                    <table class="table">

                        <tbody>
                            <tr>
                                <td>Keluhan anda</td>

                                <td>
                                    <textarea name="message" class="form-control">{{$complaint->message}}</textarea>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary mr-2">
                        Ubah Data Keluhan <i class="fas fa-fw fa-edit"></i>
                    </button>
                </div>
            </form>

        </div>

    </div>

@endsection
