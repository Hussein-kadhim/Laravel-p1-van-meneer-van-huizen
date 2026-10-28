<dialog id="delete-order-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Bestelling verwijderen</h2>
            <button
                type="button"
                id="close-delete-order"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je bestelling <strong id="delete-order-id"></strong> wilt verwijderen?
            Alle bijbehorende bestelregels worden ook verwijderd. Dit kan niet ongedaan worden gemaakt.
        </p>

        <form
            id="delete-order-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-order"
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
    const deleteOrderModal = document.getElementById('delete-order-modal');
    const deleteOrderForm = document.getElementById('delete-order-form');
    const deleteOrderId = document.getElementById('delete-order-id');
    const closeDeleteOrderBtn = document.getElementById('close-delete-order');
    const cancelDeleteOrderBtn = document.getElementById('cancel-delete-order');

    document.querySelectorAll('.open-delete-order').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.orderId;

            deleteOrderId.textContent = `#${id}`;
            deleteOrderForm.action = `/orders/${id}`;

            deleteOrderModal.showModal();
        });
    });

    closeDeleteOrderBtn?.addEventListener('click', () => deleteOrderModal.close());
    cancelDeleteOrderBtn?.addEventListener('click', () => deleteOrderModal.close());

    deleteOrderModal?.addEventListener('click', (e) => {
        if (e.target === deleteOrderModal) deleteOrderModal.close();
    });
</script>
