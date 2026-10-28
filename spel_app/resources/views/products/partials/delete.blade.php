<dialog id="delete-product-modal" class="modal">

    <div class="modal-content">

        <div class="modal-header">
            <h2>Product verwijderen</h2>

            <button
                type="button"
                id="close-delete-product"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je het product <strong id="delete-product-name"></strong> wilt verwijderen?
            Dit kan niet ongedaan worden gemaakt.
        </p>

        <form
            id="delete-product-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-product"
                    class="btn btn-secondary"
                >
                    Annuleren
                </button>

                <button
                    type="submit"
                    class="btn btn-danger"
                >
                    Verwijderen
                </button>
            </div>
        </form>
    </div>

</dialog>

<script>
    const deleteProductModal = document.getElementById('delete-product-modal');
    const deleteProductForm = document.getElementById('delete-product-form');
    const deleteProductName = document.getElementById('delete-product-name');
    const closeDeleteProductBtn = document.getElementById('close-delete-product');
    const cancelDeleteProductBtn = document.getElementById('cancel-delete-product');

    document.querySelectorAll('.open-delete-product').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.productId;
            const name = btn.dataset.productName;

            deleteProductName.textContent = name;
            deleteProductForm.action = `/products/${id}/delete`;

            deleteProductModal.showModal();
        });
    });

    closeDeleteProductBtn?.addEventListener('click', () => deleteProductModal.close());
    cancelDeleteProductBtn?.addEventListener('click', () => deleteProductModal.close());

    deleteProductModal?.addEventListener('click', (e) => {
        if (e.target === deleteProductModal) deleteProductModal.close();
    });
</script>
