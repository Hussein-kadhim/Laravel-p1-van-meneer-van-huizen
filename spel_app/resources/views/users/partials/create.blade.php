<dialog id="create-user-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nieuwe gebruiker</h2>
            <button
                type="button"
                id="close-create-user"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('users.store') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label for="create-user-name" class="form-label">Naam</label>
                <input
                    type="text"
                    id="create-user-name"
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

            <div class="form-group">
                <label for="create-user-email" class="form-label">E-mailadres</label>
                <input
                    type="email"
                    id="create-user-email"
                    name="email"
                    class="form-input"
                    value="{{ old('email') }}"
                    required
                >
                @error('email')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-user-password" class="form-label">Wachtwoord</label>
                <input
                    type="password"
                    id="create-user-password"
                    name="password"
                    class="form-input"
                    minlength="6"
                    required
                >
                @error('password')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-user-role" class="form-label">Rol</label>
                <select
                    id="create-user-role"
                    name="role_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een rol --</option>
                    @foreach ($roles as $role)
                        <option
                            value="{{ $role->id }}"
                            {{ old('role_id') == $role->id ? 'selected' : '' }}
                        >
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-user"
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
    const createUserModal = document.getElementById('create-user-modal');
    const openCreateUserBtn = document.getElementById('open-create-user');
    const closeCreateUserBtn = document.getElementById('close-create-user');
    const cancelCreateUserBtn = document.getElementById('cancel-create-user');

    openCreateUserBtn?.addEventListener('click', () => createUserModal.showModal());
    closeCreateUserBtn?.addEventListener('click', () => createUserModal.close());
    cancelCreateUserBtn?.addEventListener('click', () => createUserModal.close());

    createUserModal?.addEventListener('click', (e) => {
        if (e.target === createUserModal) createUserModal.close();
    });
</script>
