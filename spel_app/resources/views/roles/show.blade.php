@extends('layouts.app')
@section('title', $role->name)
@section('content')
<div class="card">
    <div class="card-header">
        <h1>{{ $role->name }}</h1>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Terug</a>
    </div>

    <h2>Gebruikers met deze rol</h2>
    <ul class="list">
        @forelse ($role->users as $user)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">{{ $user->name }}</span>
                    <span class="badge">{{ $user->email }}</span>
                </div>
                <div class="list-actions">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm">Bekijken</a>
                </div>
            </li>
        @empty
            <li class="list-item"><span>Geen gebruikers met deze rol.</span></li>
        @endforelse
    </ul>
</div>
@endsection
