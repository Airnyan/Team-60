{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>
@vite('resources/css/login-style.css')

<x-slot:title> Register </x-slot:title>
<!--Content Wrapper-->
<div class="container mx-auto px-4 pt-10"> 
<div class="wrapper">
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf

        <h1>Create Account</h1>

        {{-- Error messages --}}
        @if ($errors->any())
            <div class="alert alert-error" style="color: #ff8080; margin-bottom: 10px;">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="input-box">
            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <i class='bx bx-user'></i>
            @error('name')
                <p style="color:#ff8080;">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-box">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class='bx bx-envelope'></i>
            @error('email')
                <p style="color:#ff8080;">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-box">
            <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
            <i class='bx bx-phone'></i>
            @error('phone')
                <p style="color:#ff8080;">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bx-lock'></i>
            @error('password')
                <p style="color:#ff8080;">{{ $message }}</p>
            @enderror
            <p style="font-size:12px; color: #aaa;">
                Must include uppercase, lowercase, number and special character
            </p>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <i class='bx bx-lock-alt'></i>
            @error('password_confirmation')
                <p style="color:#ff8080;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn">Register</button>

        <div class="register-link">
            <a href="/login">Already have an account?</a>
        </div>
    </form>
</div>
</div>
</x-layout>