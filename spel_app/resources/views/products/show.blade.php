@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="card">
    <div class="card-header">
        <h1>{{ $product->name }}</h1>
        @if ($product->category)
            <span class="badge">{{ $product->category->name }}</span>
        @endif
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

    <div class="product-details">
        <p class="product-description">
            {{ $product->description }}
        </p>

        @php
            $latestPrice = $product->prices->sortByDesc('effdate')->first();
        @endphp

        <div class="product-purchase">
            <div class="product-price-box">
                <span class="label">Prijs</span>
                <span class="price">
                    @if ($latestPrice)
                        € {{ number_format((float) $latestPrice->price, 2, ',', '.') }}
                    @else
                        Prijs onbekend
                    @endif
                </span>
            </div>

            <form method="POST" action="{{ route('products.buy', $product->id) }}">
                @csrf
                <button type="submit" class="btn btn-success">
                    Kopen
                </button>
            </form>
        </div>
    </div>

    <div class="reviews-section">
        <h2>Reviews ({{ $product->reviews->count() }})</h2>

        @if ($product->reviews->isEmpty())
            <p class="text-muted">Nog geen reviews geplaatst voor dit product.</p>
        @else
            <ul class="list reviews-list">
                @foreach ($product->reviews as $review)
                    <li class="list-item review-item">
                        <div class="review-user">{{ $review->user->name ?? 'Klant' }}</div>
                        <p class="review-text">{{ $review->comment }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="add-review">
            <h3>Review plaatsen</h3>
            <form class="form" method="POST" action="{{ route('products.reviews.store', $product->id) }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="comment">Jouw review</label>
                    <textarea
                        class="form-input"
                        id="comment"
                        name="comment"
                        rows="3"
                        placeholder="Schrijf hier je ervaring..."
                        required
                    >{{ old('comment') }}</textarea>
                    @error('comment')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Terug
                    </a>
                    <button type="submit" class="btn">
                        Verstuur review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
