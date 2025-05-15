@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Two-Factor Authentication</h3>

    <!-- Display info message about code expiration -->
    <div class="alert alert-info">
        The 2FA code expires in 10 minutes. Please enter it promptly.
    </div>
    <form method="POST" action="{{ route('2fa.verify') }}">
    @csrf



        <div class="form-group">
            <label for="two_factor_code">Enter the code sent to your email</label>
            <input
                type="text"
                id="two_factor_code"
                name="two_factor_code"
                class="form-control"
                required
                autofocus
                maxlength="6"
            >

            <!-- Display validation error -->
            @error('two_factor_code')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3 btn-lg">Verify</button>
    </form>
</div>
@endsection
