@extends('layouts.app')
@section('title', 'Rollen')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Rollen</h1>

        <button
            type="button"
            id="open-create-role"
            class="btn"
        >
            + Nieuwe rol
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
        @forelse ($roles as $role)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">
                        {{ $role->name }}
                    </span>
                    <span class="badge">
                        {{ $role->users->count() }} gebruiker(s)
                    </span>
                </div>
                <div class="list-actions">
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-role"
                        data-role-id="{{ $role->id }}"
                        data-role-name="{{ $role->name }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-role"
                        data-role-id="{{ $role->id }}"
                        data-role-name="{{ $role->name }}"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @empty
            <li class="list-item">
                <span>Geen rollen gevonden.</span>
            </li>
        @endforelse
    </ul>
</div>

@include('roles.partials.create')
@include('roles.partials.edit')
@include('roles.partials.delete')
@endsection
