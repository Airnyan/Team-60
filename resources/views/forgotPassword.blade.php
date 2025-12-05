{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>
@vite('resources/css/login-style.css')
    <!--title page-->
    <x-slot:title>
        Forgot Password
    </x-slot:title>
    <div class="wrapper">
        <form action="sendPasswordReset.blade.php">
            <h1>Forgot your Password?</h1>
            <h3>Enter your email for a link to reset it!</h3>
            <div class="input-box">
                <input type="email" placeholder="Email" required>
                <i class='bx  bx-user'></i> 
            </div>
            <button type="submit" class="btn">Send</button>
        </form>
    </div>

    </x-layout>