<dialog id="delete-category-modal" class="modal">

    <div class="modal-content">

        <div class="modal-header">
            <h2>Categorie verwijderen</h2>

            <button
                type="button"
                id="close-delete-category"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je de categorie <strong id="delete-category-name"></strong> wilt verwijderen?
            Dit kan niet ongedaan worden gemaakt.
        </p>

        <form
            id="delete-category-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-category"
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
    const deleteModal = document.getElementById('delete-category-modal');
    const deleteForm = document.getElementById('delete-category-form');
    const deleteCategoryName = document.getElementById('delete-category-name');
    const closeDeleteBtn = document.getElementById('close-delete-category');
    const cancelDeleteBtn = document.getElementById('cancel-delete-category');

    // Alle "Verwijder"-knoppen openen de modal met de juiste category-data
    document.querySelectorAll('.open-delete-category').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.categoryId;
            const name = btn.dataset.categoryName;

            deleteCategoryName.textContent = name;
            deleteForm.action = `/categories/${id}/delete`;

            deleteModal.showModal();
        });
    });

    closeDeleteBtn?.addEventListener('click', () => deleteModal.close());
    cancelDeleteBtn?.addEventListener('click', () => deleteModal.close());

    // Sluit de modal als de gebruiker buiten de inhoud klikt
    deleteModal?.addEventListener('click', (e) => {
        if (e.target === deleteModal) deleteModal.close();
    });
</script>
