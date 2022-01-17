@extends('layouts.lte')

@section('page_header', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        
    </div>
</div>
@endsection
