{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>
    @vite('resources/css/login-style.css')

    <x-slot:title>
        Reset Password
    </x-slot:title>

    <div class="wrapper">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <h1>Reset Password</h1>
            <h3>Enter a new password below.</h3>

            <!-- Pass token -->
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="New password" required>
                <i class='bx bx-lock'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Confirm password" required>
                <i class='bx bx-lock'></i>
            </div>

            @if ($errors->any())
                <p style="color:red; font-size:14px;">
                    {{ $errors->first() }}
                </p>
            @endif

            <button type="submit" class="btn">Reset</button>
        </form>
    </div>
</x-layout>

