@extends('layouts.app')
@section('title', 'Bestelling #' . $order->id)
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Bestelling #{{ $order->id }}</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Terug</a>
    </div>

    <div class="product-details">
        <p><strong>Gebruiker:</strong> {{ $order->user?->name ?? 'Onbekend' }}</p>
        <p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($order->orderdate)->format('d-m-Y') }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
    </div>

    <h2>Orderregels</h2>
    <ul class="list">
        @forelse ($order->orderrows as $row)
            <li class="list-item">
                <span class="list-item-title">
                    {{ $row->product?->name ?? 'Onbekend product' }}
                </span>
            </li>
        @empty
            <li class="list-item">
                <span>Geen orderregels.</span>
            </li>
        @endforelse
    </ul>
</div>
@endsection
