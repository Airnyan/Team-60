<!-- -->
<!DOCTYPE html>
<!--lang specifies the language of the content-->
<html lang="en">

    <!--head tag is a container for metadata-->
    <head>
        <!--encoding type-->
        <meta charset="UTF-8">
        <!--for proper scaling-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--title page-->
        <title>{{$title ?? 'Little GreenMan Store'}}</title>
        <!--link to custom css style file--> 
        <link rel="stylesheet" href="">
        <!--link to tailwind files-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <!--Navbar-->
        <div class="navbar bg-base-100 shadow-sm">
                <a class="btn btn-ghost text-lg" href="/">Home</a>
                <a class="btn btn-ghost text-lg" href="/shop">Shop</a>
                <a class="btn btn-ghost text-lg" href="/basket">Basket</a>
                <a class="btn btn-ghost text-lg" href="/customerSupport">Customer Support</a>
                <a class="btn btn-ghost text-lg" href="/aboutUs">About Us</a>
                <a class="btn btn-ghost text-lg" href="/login">Login</a>
                <a class="btn btn-ghost text-lg" href="/signUp">Signup</a>
        </div>

         <!--slot for the other pages's content. Implemented using balde and tailwind classes-->
        <main class="container mx-auto px-4 min-h-screen pt-10">
        {{ $slot }}
        </main>


   </body>


    <!--footer -->
    <br>
    <br>
    <br>
    <footer class="footer sm:footer-horizontal bg-neutral text-neutral-content p-10">
        <nav>
            <h6 class="footer-title">Social Media Links</h6>
            <a class="link link-hover" href="#">Facebook</a>
            <a class="link link-hover" href="#">Twitter</a>
            <a class="link link-hover" href="#">Instagram</a>
        </nav>
        <nav>
            <h6 class="footer-title">Company</h6>
            <a class="link link-hover" href="#">About us</a>
            <a class="link link-hover" href="#">Contact</a>
        </nav>
        <nav>
            <h6 class="footer-title">Legal</h6>
            <a class="link link-hover" href="#">Terms of use</a>
            <a class="link link-hover" href="#">Privacy policy</a>
            <a class="link link-hover" href="#">Cookie policy</a>
        </nav>


    </footer>

</html>