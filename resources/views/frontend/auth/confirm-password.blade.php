@extends('layouts.frontend.app')

@section('content')

<section class="login-section">
    <div class="login-container">
        <div class="login-box">
            <h2>Reset Password</h2>
            <form action="{{ url('reset-password/'.$token) }}" method="POST" enctype="multipart/form-data">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                @csrf
                <div class="form-group">
                    <input type="password" id="password" name="password" required placeholder="NEW PASSWORD" class="my-2">
                   
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="CONFIRM PASSWORD" class="my-2">
                </div>
                <div class="login-btn">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>


@endsection