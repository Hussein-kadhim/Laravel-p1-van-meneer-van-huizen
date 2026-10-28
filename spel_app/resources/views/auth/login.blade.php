@extends('layouts.app')
@section('title', 'Inloggen')

@section('content')
<div class="card" style="max-width: 500px; margin: 2rem auto;">
    <div class="card-header">
        <h1>Inloggen</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" style="margin: 1rem 1.5rem 0 1.5rem;">
            <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" style="padding: 1.5rem;">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">E-mailadres</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-input"
                value="{{ old('email') }}"
                required
                autofocus
            >
            @error('email')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Wachtwoord</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-input"
                required
            >
            @error('password')
                <div class="error-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn">Inloggen</button>
        </div>
    </form>
</div>
@endsection
