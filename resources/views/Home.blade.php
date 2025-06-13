@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- User Info Card -->
            <div class="card shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Welcome, {{ Auth::user()->name }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Account Created:</strong> {{ Auth::user()->created_at->format('F d, Y') }}</p>

                    @if(Auth::user()->two_factor_expires_at)
                        <p class="text-success">
                            <strong>2FA Active</strong> (expires at {{ Auth::user()->two_factor_expires_at->format('H:i:s') }})
                        </p>
                    @else
                        <p class="text-danger"><strong>2FA Not Active</strong></p>
                    @endif
                </div>
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('Logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>

            <!-- Example Login and Sign Up Buttons (Add where needed) -->
            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('login') }}" class="btn btn-primary w-45">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary w-45">Sign Up</a>
            </div>

        </div>
    </div>
</div>
@endsection
