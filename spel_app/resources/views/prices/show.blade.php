@extends('layouts.app')
@section('title', 'Prijs #' . $price->id)
@section('content')
<div class="card">
    <div class="card-header">
        <h1>€ {{ number_format((float) $price->price, 2, ',', '.') }}</h1>
        <a href="{{ route('prices.index') }}" class="btn btn-secondary">Terug</a>
    </div>

    <div class="product-details">
        <p><strong>Product:</strong> {{ $price->product?->name ?? 'Onbekend' }}</p>
        <p><strong>Ingangsdatum:</strong> {{ \Carbon\Carbon::parse($price->effdate)->format('d-m-Y') }}</p>
        <p><strong>Prijs:</strong> € {{ number_format((float) $price->price, 2, ',', '.') }}</p>
    </div>

    @if ($price->product)
        <div class="form-actions" style="margin-top: 1rem;">
            <a href="{{ route('products.show', $price->product->id) }}" class="btn">
                Naar product
            </a>
        </div>
    @endif
</div>
@endsection
