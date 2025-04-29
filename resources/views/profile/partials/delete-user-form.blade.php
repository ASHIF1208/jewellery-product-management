<section>
    <div class="alert alert-danger py-2 mb-3">
        <p class="small mb-0">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <form method="post" action="{{ route('profile.destroy') }}" class="d-flex flex-column gap-3">
        @csrf
        @method('delete')

        <div>
            <label for="password" class="form-label small">{{ __('Password') }}</label>
            <input id="password" name="password" type="password" class="form-control form-control-sm" placeholder="{{ __('Enter your password to confirm') }}" required>
            @error('password')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-danger btn-sm">
                {{ __('Delete Account') }}
            </button>
            <p class="text-muted small mb-0">
                {{ __('This action cannot be undone.') }}
            </p>
        </div>
    </form>
</section>
