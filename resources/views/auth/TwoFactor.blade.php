@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Two-Factor Authentication</h3>
    <form method="POST" action="{{ route('2fa.store') }}">
        @csrf
        <div class="form-group">
            <label>Enter the code sent to your email</label>
            <input type="text" name="two_factor_code" class="form-control" required>
        </div>
        <button class="btn btn-primary mt-3">Verify</button>
    </form>
</div>
@endsection
