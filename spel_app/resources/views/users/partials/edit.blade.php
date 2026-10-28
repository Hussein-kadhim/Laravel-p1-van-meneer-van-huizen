<dialog id="edit-user-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Gebruiker wijzigen</h2>
            <button
                type="button"
                id="close-edit-user"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            id="edit-user-form"
            method="POST"
            action=""
            class="form"
        >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit-user-name" class="form-label">Naam</label>
                <input
                    type="text"
                    id="edit-user-name"
                    name="name"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-group">
                <label for="edit-user-email" class="form-label">E-mailadres</label>
                <input
                    type="email"
                    id="edit-user-email"
                    name="email"
                    class="form-input"
                    required
                >
            </div>

            <div class="form-group">
                <label for="edit-user-role" class="form-label">Rol</label>
                <select
                    id="edit-user-role"
                    name="role_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een rol --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="edit-user-password" class="form-label">Wachtwoord (optioneel, laat leeg om niet te wijzigen)</label>
                <input
                    type="password"
                    id="edit-user-password"
                    name="password"
                    class="form-input"
                    minlength="6"
                    placeholder="Nieuw wachtwoord..."
                >
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-edit-user"
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
    const editUserModal = document.getElementById('edit-user-modal');
    const editUserForm = document.getElementById('edit-user-form');
    const editUserName = document.getElementById('edit-user-name');
    const editUserEmail = document.getElementById('edit-user-email');
    const editUserRole = document.getElementById('edit-user-role');
    const editUserPassword = document.getElementById('edit-user-password');
    const closeEditUserBtn = document.getElementById('close-edit-user');
    const cancelEditUserBtn = document.getElementById('cancel-edit-user');

    document.querySelectorAll('.open-edit-user').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.userId;
            const name = btn.dataset.userName;
            const email = btn.dataset.userEmail;
            const roleId = btn.dataset.userRoleId || '';

            editUserName.value = name;
            editUserEmail.value = email;
            editUserRole.value = roleId;
            if (editUserPassword) editUserPassword.value = '';
            editUserForm.action = `/users/${id}`;

            editUserModal.showModal();
        });
    });

    closeEditUserBtn?.addEventListener('click', () => editUserModal.close());
    cancelEditUserBtn?.addEventListener('click', () => editUserModal.close());

    editUserModal?.addEventListener('click', (e) => {
        if (e.target === editUserModal) editUserModal.close();
    });
</script>
