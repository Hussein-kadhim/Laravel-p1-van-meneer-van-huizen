<dialog id="create-role-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nieuwe rol</h2>
            <button
                type="button"
                id="close-create-role"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('roles.store') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label for="create-role-name" class="form-label">Naam</label>
                <input
                    type="text"
                    id="create-role-name"
                    name="name"
                    class="form-input"
                    value="{{ old('name') }}"
                    required
                    autofocus
                >
                @error('name')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-role"
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
    const createRoleModal = document.getElementById('create-role-modal');
    const openCreateRoleBtn = document.getElementById('open-create-role');
    const closeCreateRoleBtn = document.getElementById('close-create-role');
    const cancelCreateRoleBtn = document.getElementById('cancel-create-role');

    openCreateRoleBtn?.addEventListener('click', () => createRoleModal.showModal());
    closeCreateRoleBtn?.addEventListener('click', () => createRoleModal.close());
    cancelCreateRoleBtn?.addEventListener('click', () => createRoleModal.close());

    createRoleModal?.addEventListener('click', (e) => {
        if (e.target === createRoleModal) createRoleModal.close();
    });
</script>
