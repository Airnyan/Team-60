<div class="profile-page">

    <h1 class="profile-title">Profile Settings</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-container">

        <!-- LEFT SIDE -->
        <div class="profile-form-section">

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf

                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" required>

                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" required>

                <label>Address</label>
                <input type="text" name="address" value="{{ $user->address }}" required>

                <label>Phone</label>
                <input type="text" name="phone" value="{{ $user->phone }}" required>

                <button type="submit" class="save-btn">
                    Save Changes
                </button>
            </form>

        </div>

        <!-- RIGHT SIDE -->
        <div class="profile-danger-section">

            <h2>Danger Zone</h2>

            <form action="{{ route('profile.delete') }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-btn">
                    Delete Account
                </button>
            </form>

        </div>

    </div>

</div>