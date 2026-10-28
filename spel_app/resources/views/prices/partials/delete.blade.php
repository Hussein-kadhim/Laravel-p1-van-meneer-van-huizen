<dialog id="delete-price-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Prijs verwijderen</h2>
            <button
                type="button"
                id="close-delete-price"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je de prijs van <strong id="delete-price-info"></strong> wilt verwijderen?
            Dit kan niet ongedaan worden gemaakt.
        </p>

        <form
            id="delete-price-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-price"
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
    const deletePriceModal = document.getElementById('delete-price-modal');
    const deletePriceForm = document.getElementById('delete-price-form');
    const deletePriceInfo = document.getElementById('delete-price-info');
    const closeDeletePriceBtn = document.getElementById('close-delete-price');
    const cancelDeletePriceBtn = document.getElementById('cancel-delete-price');

    document.querySelectorAll('.open-delete-price').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.priceId;
            const info = btn.dataset.priceInfo;

            deletePriceInfo.textContent = info;
            deletePriceForm.action = `/prices/${id}`;

            deletePriceModal.showModal();
        });
    });

    closeDeletePriceBtn?.addEventListener('click', () => deletePriceModal.close());
    cancelDeletePriceBtn?.addEventListener('click', () => deletePriceModal.close());

    deletePriceModal?.addEventListener('click', (e) => {
        if (e.target === deletePriceModal) deletePriceModal.close();
    });
</script>
