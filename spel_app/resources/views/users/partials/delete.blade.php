<dialog id="delete-user-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Gebruiker verwijderen</h2>
            <button
                type="button"
                id="close-delete-user"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je gebruiker <strong id="delete-user-name"></strong> wilt verwijderen?
            Dit kan niet ongedaan worden gemaakt.
        </p>

        <form
            id="delete-user-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-user"
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
    const deleteUserModal = document.getElementById('delete-user-modal');
    const deleteUserForm = document.getElementById('delete-user-form');
    const deleteUserName = document.getElementById('delete-user-name');
    const closeDeleteUserBtn = document.getElementById('close-delete-user');
    const cancelDeleteUserBtn = document.getElementById('cancel-delete-user');

    document.querySelectorAll('.open-delete-user').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.userId;
            const name = btn.dataset.userName;

            deleteUserName.textContent = name;
            deleteUserForm.action = `/users/${id}`;

            deleteUserModal.showModal();
        });
    });

    closeDeleteUserBtn?.addEventListener('click', () => deleteUserModal.close());
    cancelDeleteUserBtn?.addEventListener('click', () => deleteUserModal.close());

    deleteUserModal?.addEventListener('click', (e) => {
        if (e.target === deleteUserModal) deleteUserModal.close();
    });
</script>
