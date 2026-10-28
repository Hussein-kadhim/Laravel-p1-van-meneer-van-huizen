@extends('layouts.app')
@section('title', 'Review #' . $review->id)
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Review</h1>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Terug</a>
    </div>

    <div class="product-details">
        <p><strong>Commentaar:</strong> {{ $review->comment }}</p>
        <p><strong>Product:</strong>
            @if ($review->product)
                <a href="{{ route('products.show', $review->product->id) }}">{{ $review->product->name }}</a>
            @else
                Onbekend
            @endif
        </p>
        <p><strong>Gebruiker:</strong>
            @if ($review->user)
                <a href="{{ route('users.show', $review->user->id) }}">{{ $review->user->name }}</a>
            @else
                Onbekend
            @endif
        </p>
    </div>
</div>
@endsection
