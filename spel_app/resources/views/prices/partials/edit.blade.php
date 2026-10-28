<dialog id="edit-price-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Prijs wijzigen</h2>
            <button
                type="button"
                id="close-edit-price"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            id="edit-price-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-price-amount" class="form-label">Prijs (€)</label>
                <input
                    type="number"
                    id="edit-price-amount"
                    name="price"
                    class="form-input"
                    step="0.01"
                    min="0"
                    required
                >
            </div>

            <div class="form-group">
                <label for="edit-price-effdate" class="form-label">Ingangsdatum</label>
                <input
                    type="date"
                    id="edit-price-effdate"
                    name="effdate"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-group">
                <label for="edit-price-product" class="form-label">Product</label>
                <select
                    id="edit-price-product"
                    name="product_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een product --</option>
                    @foreach ($products as $prod)
                        <option value="{{ $prod->id }}">
                            {{ $prod->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-edit-price"
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
    const editPriceModal = document.getElementById('edit-price-modal');
    const editPriceForm = document.getElementById('edit-price-form');
    const editPriceAmount = document.getElementById('edit-price-amount');
    const editPriceEffdate = document.getElementById('edit-price-effdate');
    const editPriceProduct = document.getElementById('edit-price-product');
    const closeEditPriceBtn = document.getElementById('close-edit-price');
    const cancelEditPriceBtn = document.getElementById('cancel-edit-price');

    document.querySelectorAll('.open-edit-price').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.priceId;
            const price = btn.dataset.priceAmount;
            const effdate = btn.dataset.priceEffdate;
            const productId = btn.dataset.priceProductId;

            editPriceAmount.value = price;
            editPriceEffdate.value = effdate;
            editPriceProduct.value = productId;
            editPriceForm.action = `/prices/${id}`;

            editPriceModal.showModal();
        });
    });

    closeEditPriceBtn?.addEventListener('click', () => editPriceModal.close());
    cancelEditPriceBtn?.addEventListener('click', () => editPriceModal.close());

    editPriceModal?.addEventListener('click', (e) => {
        if (e.target === editPriceModal) editPriceModal.close();
    });
</script>
