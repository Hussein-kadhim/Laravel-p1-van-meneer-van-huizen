<dialog id="delete-role-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Rol verwijderen</h2>
            <button
                type="button"
                id="close-delete-role"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <p class="modal-body">
            Weet je zeker dat je de rol <strong id="delete-role-name"></strong> wilt verwijderen?
            Dit kan niet ongedaan worden gemaakt.
        </p>

        <form
            id="delete-role-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('DELETE')

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-delete-role"
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
    const deleteRoleModal = document.getElementById('delete-role-modal');
    const deleteRoleForm = document.getElementById('delete-role-form');
    const deleteRoleName = document.getElementById('delete-role-name');
    const closeDeleteRoleBtn = document.getElementById('close-delete-role');
    const cancelDeleteRoleBtn = document.getElementById('cancel-delete-role');

    document.querySelectorAll('.open-delete-role').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.roleId;
            const name = btn.dataset.roleName;

            deleteRoleName.textContent = name;
            deleteRoleForm.action = `/roles/${id}`;

            deleteRoleModal.showModal();
        });
    });

    closeDeleteRoleBtn?.addEventListener('click', () => deleteRoleModal.close());
    cancelDeleteRoleBtn?.addEventListener('click', () => deleteRoleModal.close());

    deleteRoleModal?.addEventListener('click', (e) => {
        if (e.target === deleteRoleModal) deleteRoleModal.close();
    });
</script>
