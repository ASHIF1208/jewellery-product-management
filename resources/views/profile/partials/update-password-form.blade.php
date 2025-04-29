<section>
    <header class="mb-6">
        <h2 class="h4 fw-semibold text-dark">
            {{ __('Update Password') }}
        </h2>

        <p class="text-muted small">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="d-flex flex-column gap-3">
        @csrf
        @method('put')

        <div class="row g-3">
            <div class="col-md-12">
                <label for="current_password" class="form-label small">{{ __('Current Password') }}</label>
                <input id="current_password" name="current_password" type="password" class="form-control form-control-sm" autocomplete="current-password">
                @error('current_password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label small">{{ __('New Password') }}</label>
                <input id="password" name="password" type="password" class="form-control form-control-sm" autocomplete="new-password">
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password_confirmation" class="form-label small">{{ __('Confirm New Password') }}</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-sm" autocomplete="new-password">
                @error('password_confirmation')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="alert alert-info py-2">
            <p class="small mb-0">
                {{ __('Make sure your password is at least 8 characters long and includes a mix of letters, numbers, and special characters.') }}
            </p>
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn-luxury btn-sm">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-success small mb-0">
                    {{ __('Password updated successfully.') }}
                </p>
            @endif
        </div>
    </form>
</section>
