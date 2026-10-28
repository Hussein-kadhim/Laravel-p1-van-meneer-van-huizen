<dialog id="edit-category-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Categorie wijzigen</h2>
            <button type="button" id="close-edit-category" class="modal-close">&times;</button>
        </div>

        <form id="edit-category-form" method="POST" action="" class="form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-category-name-input" class="form-label">Naam</label>
                <input
                    type="text"
                    id="edit-category-name-input"
                    name="name"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-actions">
                <button type="button" id="cancel-edit-category" class="btn btn-secondary">
                    Annuleren
                </button>
                <button type="submit" class="btn">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</dialog>

<script>
    const editCategoryModal = document.getElementById('edit-category-modal');
    const editCategoryForm = document.getElementById('edit-category-form');
    const editCategoryNameInput = document.getElementById('edit-category-name-input');
    const closeEditCategoryBtn = document.getElementById('close-edit-category');
    const cancelEditCategoryBtn = document.getElementById('cancel-edit-category');

    document.querySelectorAll('.open-edit-category').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.categoryId;
            const name = btn.dataset.categoryName;

            editCategoryNameInput.value = name;
            editCategoryForm.action = `/categories/${id}`;

            editCategoryModal.showModal();
        });
    });

    closeEditCategoryBtn?.addEventListener('click', () => editCategoryModal.close());
    cancelEditCategoryBtn?.addEventListener('click', () => editCategoryModal.close());

    editCategoryModal?.addEventListener('click', (e) => {
        if (e.target === editCategoryModal) editCategoryModal.close();
    });
</script>
