{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>
    @vite('resources/css/login-style.css')

    <x-slot:title>
        Forgot Password
    </x-slot:title>

    <div class="wrapper">
        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <h1>Forgot your Password?</h1>
            <h3>Enter your email for a link to reset it!</h3>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bx-user'></i>
            </div>

            @error('email')
                <p style="color:red; font-size:14px;">{{ $message }}</p>
            @enderror

            @if(session('success'))
                <p style="color:lightgreen; font-size:14px;">{{ session('success') }}</p>
            @endif

            <button type="submit" class="btn">Send</button>
        </form>
    </div>
</x-layout>
