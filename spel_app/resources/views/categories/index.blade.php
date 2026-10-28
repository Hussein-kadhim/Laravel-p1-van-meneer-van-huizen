@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Categories</h1>

        <button
            type="button"
            id="open-create-category"
            class="btn"
        >
            + Nieuwe categorie
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
        @foreach ($categories as $category)
            <li class="list-item">
                <span class="list-item-title">
                    {{ $category->name }}
                </span>
                <div class="list-actions">
                    <a href="{{ route('categories.get', $category->id) }}" class="btn btn-sm">
                        Bekijken
                    </a>

                    <button
                        type="button"
                        class="btn btn-sm btn-warning open-edit-category"
                        data-category-id="{{ $category->id }}"
                        data-category-name="{{ $category->name }}"
                    >
                        Wijzigen
                    </button>

                    <button
                        type="button"
                        class="btn btn-sm btn-danger open-delete-category"
                        data-category-id="{{ $category->id }}"
                        data-category-name="{{ $category->name }}"
                    >
                        Verwijderen
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@include('categories.partials.create')
@include('categories.partials.edit')
@include('categories.partials.delete')
@endsection
