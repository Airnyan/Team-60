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
        Login
    </x-slot:title>
    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="email" placeholder="Email" required>
                <i class='bx  bx-user'></i> 
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx  bx-lock'></i> 
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember Me</label>
                <a href="/forgotPassword">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <a href="/register">Don't have an account?</a>
            </div>
        </form>
    </div>

    </x-layout>