<dialog id="create-review-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nieuwe review</h2>
            <button
                type="button"
                id="close-create-review"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('reviews.store') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label for="create-review-product" class="form-label">Product</label>
                <select
                    id="create-review-product"
                    name="product_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een product --</option>
                    @foreach ($products as $product)
                        <option
                            value="{{ $product->id }}"
                            {{ old('product_id') == $product->id ? 'selected' : '' }}
                        >
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-review-user" class="form-label">Gebruiker</label>
                <select
                    id="create-review-user"
                    name="user_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een gebruiker --</option>
                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ old('user_id') == $user->id ? 'selected' : '' }}
                        >
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-review-comment" class="form-label">Review / Commentaar</label>
                <textarea
                    id="create-review-comment"
                    name="comment"
                    class="form-input"
                    rows="4"
                    required
                >{{ old('comment') }}</textarea>
                @error('comment')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-review"
                    class="btn btn-secondary"
                >
                    Annuleren
                </button>

                <button
                    type="submit"
                    class="btn"
                >
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</dialog>

<script>
    const createReviewModal = document.getElementById('create-review-modal');
    const openCreateReviewBtn = document.getElementById('open-create-review');
    const closeCreateReviewBtn = document.getElementById('close-create-review');
    const cancelCreateReviewBtn = document.getElementById('cancel-create-review');

    openCreateReviewBtn?.addEventListener('click', () => createReviewModal.showModal());
    closeCreateReviewBtn?.addEventListener('click', () => createReviewModal.close());
    cancelCreateReviewBtn?.addEventListener('click', () => createReviewModal.close());

    createReviewModal?.addEventListener('click', (e) => {
        if (e.target === createReviewModal) createReviewModal.close();
    });
</script>
