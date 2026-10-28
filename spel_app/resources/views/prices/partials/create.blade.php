<dialog id="create-price-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nieuwe prijs</h2>
            <button
                type="button"
                id="close-create-price"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('prices.store') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label for="create-price-amount" class="form-label">Prijs (€)</label>
                <input
                    type="number"
                    id="create-price-amount"
                    name="price"
                    class="form-input"
                    step="0.01"
                    min="0"
                    value="{{ old('price') }}"
                    required
                    autofocus
                >
                @error('price')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-price-effdate" class="form-label">Ingangsdatum</label>
                <input
                    type="date"
                    id="create-price-effdate"
                    name="effdate"
                    class="form-input"
                    value="{{ old('effdate', date('Y-m-d')) }}"
                    required
                >
                @error('effdate')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-price-product" class="form-label">Product</label>
                <select
                    id="create-price-product"
                    name="product_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een product --</option>
                    @foreach ($products as $prod)
                        <option
                            value="{{ $prod->id }}"
                            {{ old('product_id') == $prod->id ? 'selected' : '' }}
                        >
                            {{ $prod->name }}
                        </option>
                    @endforeach
                </select>
                @error('product_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-price"
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
    const createPriceModal = document.getElementById('create-price-modal');
    const openCreatePriceBtn = document.getElementById('open-create-price');
    const closeCreatePriceBtn = document.getElementById('close-create-price');
    const cancelCreatePriceBtn = document.getElementById('cancel-create-price');

    openCreatePriceBtn?.addEventListener('click', () => createPriceModal.showModal());
    closeCreatePriceBtn?.addEventListener('click', () => createPriceModal.close());
    cancelCreatePriceBtn?.addEventListener('click', () => createPriceModal.close());

    createPriceModal?.addEventListener('click', (e) => {
        if (e.target === createPriceModal) createPriceModal.close();
    });
</script>
