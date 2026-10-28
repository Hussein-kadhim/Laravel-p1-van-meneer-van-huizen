<dialog id="edit-order-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Bestelling wijzigen</h2>
            <button
                type="button"
                id="close-edit-order"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            id="edit-order-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-order-date" class="form-label">Besteldatum</label>
                <input
                    type="date"
                    id="edit-order-date"
                    name="orderdate"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-group">
                <label for="edit-order-status" class="form-label">Status</label>
                <select
                    id="edit-order-status"
                    name="status"
                    class="form-input"
                    required
                >
                    <option value="1">1 - In behandeling</option>
                    <option value="2">2 - Afgerond</option>
                    <option value="3">3 - Geannuleerd</option>
                </select>
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-edit-order"
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
    const editOrderModal = document.getElementById('edit-order-modal');
    const editOrderForm = document.getElementById('edit-order-form');
    const editOrderDate = document.getElementById('edit-order-date');
    const editOrderStatus = document.getElementById('edit-order-status');
    const closeEditOrderBtn = document.getElementById('close-edit-order');
    const cancelEditOrderBtn = document.getElementById('cancel-edit-order');

    document.querySelectorAll('.open-edit-order').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.orderId;
            const date = btn.dataset.orderDate;
            const status = btn.dataset.orderStatus;

            editOrderDate.value = date;
            editOrderStatus.value = status;
            editOrderForm.action = `/orders/${id}`;

            editOrderModal.showModal();
        });
    });

    closeEditOrderBtn?.addEventListener('click', () => editOrderModal.close());
    cancelEditOrderBtn?.addEventListener('click', () => editOrderModal.close());

    editOrderModal?.addEventListener('click', (e) => {
        if (e.target === editOrderModal) editOrderModal.close();
    });
</script>
