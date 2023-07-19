@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Use this link to reset your password.') }}
                    <a
                        href="{{ route('getPassword', ['token' => $token]) }}"
                        class="btn btn-link p-0 m-0 align-baseline">
                        {{ __('click here') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
