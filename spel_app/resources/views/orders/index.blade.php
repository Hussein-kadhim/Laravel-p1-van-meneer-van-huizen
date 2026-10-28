@extends('layouts.app')
@section('title', 'Bestellingen')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Bestellingen</h1>

        <button
            type="button"
            id="open-create-order"
            class="btn"
        >
            + Nieuwe bestelling
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
        @forelse ($orders as $order)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">
                        Bestelling #{{ $order->id }}
                    </span>
                    <span class="badge">
                        {{ $order->user?->name ?? 'Onbekend' }}
                    </span>
                    <span class="badge">
                        {{ \Carbon\Carbon::parse($order->orderdate)->format('d-m-Y') }}
                    </span>
                    <span class="badge">
                        Status: {{ $order->status }}
                    </span>
                </div>
                <div class="list-actions">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-order"
                        data-order-id="{{ $order->id }}"
                        data-order-date="{{ \Carbon\Carbon::parse($order->orderdate)->format('Y-m-d') }}"
                        data-order-status="{{ $order->status }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-order"
                        data-order-id="{{ $order->id }}"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @empty
            <li class="list-item">
                <span>Geen bestellingen gevonden.</span>
            </li>
        @endforelse
    </ul>
</div>

@include('orders.partials.create')
@include('orders.partials.edit')
@include('orders.partials.delete')
@endsection
