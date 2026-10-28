@extends('layouts.app')

@section('title', 'Producten')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Producten</h1>

        <button
            type="button"
            id="open-create-product"
            class="btn"
        >
            + Nieuw product
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
        @forelse ($products as $product)
            @php
                $latestPrice = $product->prices->sortByDesc('effdate')->first();
            @endphp
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">
                        {{ $product->name }}
                    </span>
                    @if ($product->category)
                        <span class="badge">
                            {{ $product->category->name }}
                        </span>
                    @endif
                    @if ($latestPrice)
                        <span class="price-tag">
                            € {{ number_format((float) $latestPrice->price, 2, ',', '.') }}
                        </span>
                    @endif
                </div>
                <div class="list-actions">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-product"
                        data-product-id="{{ $product->id }}"
                        data-product-name="{{ $product->name }}"
                        data-product-description="{{ $product->description }}"
                        data-product-category-id="{{ $product->category_id }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-product"
                        data-product-id="{{ $product->id }}"
                        data-product-name="{{ $product->name }}"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @empty
            <li class="list-item">
                <span>Geen producten gevonden.</span>
            </li>
        @endforelse
    </ul>
</div>

@include('products.partials.create')
@include('products.partials.edit')
@include('products.partials.delete')
@endsection
