<dialog id="edit-product-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Product wijzigen</h2>
            <button
                type="button"
                id="close-edit-product"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            id="edit-product-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-product-name" class="form-label">Naam</label>
                <input
                    type="text"
                    id="edit-product-name"
                    name="name"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-group">
                <label for="edit-product-description" class="form-label">Beschrijving</label>
                <textarea
                    id="edit-product-description"
                    name="description"
                    class="form-input"
                    rows="3"
                    required
                ></textarea>
            </div>

            <div class="form-group">
                <label for="edit-product-category" class="form-label">Categorie</label>
                <select
                    id="edit-product-category"
                    name="category_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een categorie --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-edit-product"
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
    const editProductModal = document.getElementById('edit-product-modal');
    const editProductForm = document.getElementById('edit-product-form');
    const editProductName = document.getElementById('edit-product-name');
    const editProductDescription = document.getElementById('edit-product-description');
    const editProductCategory = document.getElementById('edit-product-category');
    const closeEditProductBtn = document.getElementById('close-edit-product');
    const cancelEditProductBtn = document.getElementById('cancel-edit-product');

    document.querySelectorAll('.open-edit-product').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.productId;
            const name = btn.dataset.productName;
            const description = btn.dataset.productDescription || '';
            const categoryId = btn.dataset.productCategoryId || '';

            editProductName.value = name;
            editProductDescription.value = description;
            editProductCategory.value = categoryId;
            editProductForm.action = `/products/${id}`;

            editProductModal.showModal();
        });
    });

    closeEditProductBtn?.addEventListener('click', () => editProductModal.close());
    cancelEditProductBtn?.addEventListener('click', () => editProductModal.close());

    editProductModal?.addEventListener('click', (e) => {
        if (e.target === editProductModal) editProductModal.close();
    });
</script>
