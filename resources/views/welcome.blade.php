@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align='center'>{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <li>
                            {{ __('Silahkan Login Jika Sudah Memiliki Account') }}
                        </li>
                        <li>
                            {{ __('Silahkan Registrasi Jika Belum Memiliki Account') }}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
