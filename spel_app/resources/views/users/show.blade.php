@extends('layouts.app')
@section('title', $user->name)
@section('content')
<div class="card">
    <div class="card-header">
        <h1>{{ $user->name }}</h1>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Terug</a>
    </div>

    <div class="product-details">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Rol:</strong> {{ $user->role?->name ?? 'Geen rol' }}</p>
    </div>

    <h2>Bestellingen</h2>
    <ul class="list">
        @forelse ($user->orders as $order)
            <li class="list-item">
                <span class="list-item-title">Bestelling #{{ $order->id }}</span>
                <span class="badge">{{ \Carbon\Carbon::parse($order->orderdate)->format('d-m-Y') }}</span>
                <div class="list-actions">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm">Bekijken</a>
                </div>
            </li>
        @empty
            <li class="list-item"><span>Geen bestellingen.</span></li>
        @endforelse
    </ul>

    <h2>Reviews</h2>
    <ul class="list">
        @forelse ($user->reviews as $review)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">{{ Str::limit($review->comment, 60) }}</span>
                    @if ($review->product)
                        <span class="badge">{{ $review->product->name }}</span>
                    @endif
                </div>
            </li>
        @empty
            <li class="list-item"><span>Geen reviews.</span></li>
        @endforelse
    </ul>
</div>
@endsection
