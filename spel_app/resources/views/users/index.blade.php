@extends('layouts.app')
@section('title', 'Gebruikers')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Gebruikers</h1>

        <button
            type="button"
            id="open-create-user"
            class="btn"
        >
            + Nieuwe gebruiker
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <ul class="list">
        @forelse ($users as $user)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">
                        {{ $user->name }}
                    </span>
                    <span class="badge">
                        {{ $user->email }}
                    </span>
                    @if ($user->role)
                        <span class="badge">
                            {{ $user->role->name }}
                        </span>
                    @endif
                </div>
                <div class="list-actions">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-user"
                        data-user-id="{{ $user->id }}"
                        data-user-name="{{ $user->name }}"
                        data-user-email="{{ $user->email }}"
                        data-user-role-id="{{ $user->role_id }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-user"
                        data-user-id="{{ $user->id }}"
                        data-user-name="{{ $user->name }}"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @empty
            <li class="list-item">
                <span>Geen gebruikers gevonden.</span>
            </li>
        @endforelse
    </ul>
</div>

@include('users.partials.create')
@include('users.partials.edit')
@include('users.partials.delete')
@endsection
