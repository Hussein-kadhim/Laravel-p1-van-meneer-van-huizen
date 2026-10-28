<dialog id="edit-review-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Review wijzigen</h2>
            <button
                type="button"
                id="close-edit-review"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            id="edit-review-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-review-comment" class="form-label">Review / Commentaar</label>
                <textarea
                    id="edit-review-comment"
                    name="comment"
                    class="form-input"
                    rows="4"
                    required
                ></textarea>
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-edit-review"
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
    const editReviewModal = document.getElementById('edit-review-modal');
    const editReviewForm = document.getElementById('edit-review-form');
    const editReviewComment = document.getElementById('edit-review-comment');
    const closeEditReviewBtn = document.getElementById('close-edit-review');
    const cancelEditReviewBtn = document.getElementById('cancel-edit-review');

    document.querySelectorAll('.open-edit-review').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.reviewId;
            const comment = btn.dataset.reviewComment;

            editReviewComment.value = comment;
            editReviewForm.action = `/reviews/${id}`;

            editReviewModal.showModal();
        });
    });

    closeEditReviewBtn?.addEventListener('click', () => editReviewModal.close());
    cancelEditReviewBtn?.addEventListener('click', () => editReviewModal.close());

    editReviewModal?.addEventListener('click', (e) => {
        if (e.target === editReviewModal) editReviewModal.close();
    });
</script>
