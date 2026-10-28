<dialog id="create-product-modal" class="modal">

    <div class="modal-content">

        <div class="modal-header">
            <h2>Nieuw product</h2>

            <button
                type="button"
                id="close-create-product"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('products.create') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label for="product-name" class="form-label">Naam</label>
                <input
                    type="text"
                    id="product-name"
                    name="name"
                    class="form-input"
                    value="{{ old('name') }}"
                    required
                    autofocus
                >
                @error('name')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="product-description" class="form-label">Beschrijving</label>
                <textarea
                    id="product-description"
                    name="description"
                    class="form-input"
                    rows="3"
                    required
                >{{ old('description') }}</textarea>
                @error('description')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="product-category" class="form-label">Categorie</label>
                <select
                    id="product-category"
                    name="category_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een categorie --</option>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-product"
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
    const createProductModal = document.getElementById('create-product-modal');
    const openCreateProductBtn = document.getElementById('open-create-product');
    const closeCreateProductBtn = document.getElementById('close-create-product');
    const cancelCreateProductBtn = document.getElementById('cancel-create-product');

    openCreateProductBtn?.addEventListener('click', () => createProductModal.showModal());
    closeCreateProductBtn?.addEventListener('click', () => createProductModal.close());
    cancelCreateProductBtn?.addEventListener('click', () => createProductModal.close());

    createProductModal?.addEventListener('click', (e) => {
        if (e.target === createProductModal) createProductModal.close();
    });
</script>
