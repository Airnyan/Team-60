<x-layout>

    <x-slot:title>
        Profile Page
    </x-slot:title>

@vite('resources/css/styles.css')
@vite('resources/css/profile.css')

<div class="profile-page">
    
    <h1 class="profile-title">Profile Settings</h1>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-container grid grid-cols-1 lg:grid-cols-2 gap-10">

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
        <div class="profile-account-section">

            <h2 class="section-title">Account Management</h2>
            <p class="section-description">
                Manage critical account actions. Please proceed with caution.
            </p>

            <div class="account-password-box">

                <h3>Change Password</h3>

                <p class="action-text">
                    Update your account password for better security.
                </p>

                <form action="{{ route('profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label>Current Password</label>
                    <input type="password" name="current_password" required>

                    @error('current_password')
                        <p style="color:red">{{ $message }}</p>
                    @enderror


                    <label>New Password</label>
                    <input type="password" name="password" required>

                    @error('password')
                        <p style="color:red">{{ $message }}</p>
                    @enderror


                    <label>Confirm New Password</label>
                    <input type="password" name="password_confirmation" required>

                    <button type="submit" class="update-password-btn" >
                        Update Password
                    </button>

                </form>

            </div>

            <div class="account-action-box">
                <h3>Delete Account</h3>
                <p class="action-text">
                    Deleting your account will permanently remove all associated data. 
                    This action is irreversible.
                </p>

                <form action="{{ route('profile.delete') }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to permanently delete your account? This action is irreversible.');">
                @csrf
                @method('DELETE')

                <button type="submit" class="delete-btn">
                    Delete Account
                </button>
            </form>
        </div>

        </div>

    </div>

</div>

</x-layout>