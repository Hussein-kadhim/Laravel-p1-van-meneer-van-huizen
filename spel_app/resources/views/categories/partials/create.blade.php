<dialog id="create-category-modal" class="modal">

    <div class="modal-content">

        <div class="modal-header">
            <h2>Nieuwe categorie</h2>

            <button
                type="button"
                id="close-create-category"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('categories.create') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label
                    for="name"
                    class="form-label"
                >
                    Naam
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-input"
                    value="{{ old('name') }}"
                    required
                    autofocus
                >

                @error('name')
                    <span class="form-error">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-category"
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
    const createModal = document.getElementById('create-category-modal');
    const openCreateBtn = document.getElementById('open-create-category');
    const closeCreateBtn = document.getElementById('close-create-category');
    const cancelCreateBtn = document.getElementById('cancel-create-category');

    openCreateBtn?.addEventListener('click', () => createModal.showModal());
    closeCreateBtn?.addEventListener('click', () => createModal.close());
    cancelCreateBtn?.addEventListener('click', () => createModal.close());

    // Sluit de modal als de gebruiker buiten de inhoud klikt
    createModal?.addEventListener('click', (e) => {
        if (e.target === createModal) createModal.close();
    });
</script>
