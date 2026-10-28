@extends('layouts.app')
@section('title', 'Prijzen')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Prijzen</h1>

        <button
            type="button"
            id="open-create-price"
            class="btn"
        >
            + Nieuwe prijs
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
        @forelse ($prices as $price)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">
                        € {{ number_format((float) $price->price, 2, ',', '.') }}
                    </span>
                    @if ($price->product)
                        <span class="badge">
                            {{ $price->product->name }}
                        </span>
                    @endif
                    <span class="badge">
                        {{ \Carbon\Carbon::parse($price->effdate)->format('d-m-Y') }}
                    </span>
                </div>
                <div class="list-actions">
                    <a href="{{ route('prices.show', $price->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-price"
                        data-price-id="{{ $price->id }}"
                        data-price-amount="{{ $price->price }}"
                        data-price-effdate="{{ \Carbon\Carbon::parse($price->effdate)->format('Y-m-d') }}"
                        data-price-product-id="{{ $price->product_id }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-price"
                        data-price-id="{{ $price->id }}"
                        data-price-info="€ {{ number_format((float) $price->price, 2, ',', '.') }} ({{ $price->product?->name ?? 'Onbekend product' }})"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @empty
            <li class="list-item">
                <span>Geen prijzen gevonden.</span>
            </li>
        @endforelse
    </ul>
</div>

@include('prices.partials.create')
@include('prices.partials.edit')
@include('prices.partials.delete')
@endsection
