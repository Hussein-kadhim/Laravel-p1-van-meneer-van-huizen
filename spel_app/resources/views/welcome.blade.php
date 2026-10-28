@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero">
    <div class="hero-content">
        <p class="eyebrow">Laravel applicatie</p>
        <h1>Welkom bij Spel App</h1>
        <p class="hero-text">
            Beheer hier eenvoudig alle categorieën, producten en bestellingen van de applicatie.
        </p>
        <div class="hero-actions">
            <a href="{{ route('categories.index') }}" class="btn">
                Bekijk categorieën
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                Bekijk producten
            </a>
        </div>
    </div>
</section>
@endsection