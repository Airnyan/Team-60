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
        Reset Password
    </x-slot:title>
    <div class="wrapper">
        <form action="">
            <h1>Reset Password?</h1>
            <h3>Enter a new password below.</h3>
            <div class="input-box">
                <input type="text" placeholder="Enter a new password." required>
                <i class='bx  bx-lock'></i> 
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter it again!" required>
                <i class='bx  bx-lock'></i> 
            </div>
            <button type="submit" class="btn">Reset</button>
        </form>
    </div>

    </x-layout>
