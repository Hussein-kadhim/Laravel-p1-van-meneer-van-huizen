<dialog id="delete-review-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Review verwijderen</h2>
            <button
                type="button"
                id="close-delete-review"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je deze review wilt verwijderen?
            <br>
            <em id="delete-review-snippet" style="color: var(--color-muted, #666); margin-top: 0.5rem; display: block;"></em>
        </p>

        <form
            id="delete-review-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-review"
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
    const deleteReviewModal = document.getElementById('delete-review-modal');
    const deleteReviewForm = document.getElementById('delete-review-form');
    const deleteReviewSnippet = document.getElementById('delete-review-snippet');
    const closeDeleteReviewBtn = document.getElementById('close-delete-review');
    const cancelDeleteReviewBtn = document.getElementById('cancel-delete-review');

    document.querySelectorAll('.open-delete-review').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.reviewId;
            const snippet = btn.dataset.reviewSnippet;

            deleteReviewSnippet.textContent = `"${snippet}"`;
            deleteReviewForm.action = `/reviews/${id}`;

            deleteReviewModal.showModal();
        });
    });

    closeDeleteReviewBtn?.addEventListener('click', () => deleteReviewModal.close());
    cancelDeleteReviewBtn?.addEventListener('click', () => deleteReviewModal.close());

    deleteReviewModal?.addEventListener('click', (e) => {
        if (e.target === deleteReviewModal) deleteReviewModal.close();
    });
</script>
