<dialog id="create-order-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Nieuwe bestelling</h2>
            <button
                type="button"
                id="close-create-order"
                class="modal-close"
            >
                &times;
            </button>
        </div>

        <form
            method="POST"
            action="{{ route('orders.store') }}"
            class="form"
        >
            @csrf

            <div class="form-group">
                <label for="create-order-user" class="form-label">Klant / Gebruiker</label>
                <select
                    id="create-order-user"
                    name="user_id"
                    class="form-input"
                    required
                >
                    <option value="">-- Kies een klant --</option>
                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}"
                            {{ old('user_id') == $user->id ? 'selected' : '' }}
                        >
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-order-date" class="form-label">Besteldatum</label>
                <input
                    type="date"
                    id="create-order-date"
                    name="orderdate"
                    class="form-input"
                    value="{{ old('orderdate', date('Y-m-d')) }}"
                    required
                >
                @error('orderdate')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="create-order-status" class="form-label">Status</label>
                <select
                    id="create-order-status"
                    name="status"
                    class="form-input"
                    required
                >
                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>1 - In behandeling</option>
                    <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>2 - Afgerond</option>
                    <option value="3" {{ old('status') == '3' ? 'selected' : '' }}>3 - Geannuleerd</option>
                </select>
                @error('status')
                    <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button
                    type="button"
                    id="cancel-create-order"
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
    const createOrderModal = document.getElementById('create-order-modal');
    const openCreateOrderBtn = document.getElementById('open-create-order');
    const closeCreateOrderBtn = document.getElementById('close-create-order');
    const cancelCreateOrderBtn = document.getElementById('cancel-create-order');

    openCreateOrderBtn?.addEventListener('click', () => createOrderModal.showModal());
    closeCreateOrderBtn?.addEventListener('click', () => createOrderModal.close());
    cancelCreateOrderBtn?.addEventListener('click', () => createOrderModal.close());

    createOrderModal?.addEventListener('click', (e) => {
        if (e.target === createOrderModal) createOrderModal.close();
    });
</script>
