{{-- File: resources/views/layouts/home.blade.php --}}
@extends('layouts.app') {{-- Adjust this to match your main layout file (e.g., layouts.master) --}}

@section('title', 'User Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Welcome, {{ $user->name }} 👋</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5>Your Account Info</h5>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>2FA Code:</strong> {{ $user->two_factor_code ?? 'Not set' }}</p>
            <p><strong>2FA Expires:</strong> {{ $user->two_factor_expires_at ?? 'N/A' }}</p>
            <p><strong>Member Since:</strong> {{ $user->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <div class="mt-4">
        <h3>Your Betslips</h3>

        @if($betslips->isEmpty())
            <p class="text-muted">You have no betslips yet.</p>
        @else
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($betslips as $betslip)
                        <tr>
                            <td>{{ $betslip->id }}</td>
                            <td>{{ $betslip->status ?? 'Pending' }}</td>
                            <td>{{ $betslip->amount ?? 'N/A' }}</td>
                            <td>{{ $betslip->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection

