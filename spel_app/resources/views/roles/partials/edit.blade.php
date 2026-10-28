<dialog id="edit-role-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Rol wijzigen</h2>
            <button
                type="button"
                id="close-edit-role"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            id="edit-role-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-role-name" class="form-label">Naam</label>
                <input
                    type="text"
                    id="edit-role-name"
                    name="name"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-edit-role"
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
    const editRoleModal = document.getElementById('edit-role-modal');
    const editRoleForm = document.getElementById('edit-role-form');
    const editRoleName = document.getElementById('edit-role-name');
    const closeEditRoleBtn = document.getElementById('close-edit-role');
    const cancelEditRoleBtn = document.getElementById('cancel-edit-role');

    document.querySelectorAll('.open-edit-role').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.roleId;
            const name = btn.dataset.roleName;

            editRoleName.value = name;
            editRoleForm.action = `/roles/${id}`;

            editRoleModal.showModal();
        });
    });

    closeEditRoleBtn?.addEventListener('click', () => editRoleModal.close());
    cancelEditRoleBtn?.addEventListener('click', () => editRoleModal.close());

    editRoleModal?.addEventListener('click', (e) => {
        if (e.target === editRoleModal) editRoleModal.close();
    });
</script>
