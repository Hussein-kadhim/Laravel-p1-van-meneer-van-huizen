@extends('layouts.app')
@section('title', 'Reviews')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Reviews</h1>

        <button
            type="button"
            id="open-create-review"
            class="btn"
        >
            + Nieuwe review
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
        @forelse ($reviews as $review)
            <li class="list-item">
                <div class="list-item-info">
                    <span class="list-item-title">
                        {{ Str::limit($review->comment, 60) }}
                    </span>
                    @if ($review->product)
                        <span class="badge">
                            {{ $review->product->name }}
                        </span>
                    @endif
                    @if ($review->user)
                        <span class="badge">
                            {{ $review->user->name }}
                        </span>
                    @endif
                </div>
                <div class="list-actions">
                    <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-review"
                        data-review-id="{{ $review->id }}"
                        data-review-comment="{{ $review->comment }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-review"
                        data-review-id="{{ $review->id }}"
                        data-review-snippet="{{ Str::limit($review->comment, 40) }}"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @empty
            <li class="list-item">
                <span>Geen reviews gevonden.</span>
            </li>
        @endforelse
    </ul>
</div>

@include('reviews.partials.create')
@include('reviews.partials.edit')
@include('reviews.partials.delete')
@endsection
