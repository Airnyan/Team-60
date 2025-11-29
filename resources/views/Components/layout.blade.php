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
        <!--link to Google Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <!--link to custom css style file--> 
        <link rel="stylesheet" href="">
        <!--link to tailwind files-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <!--Navbar-->
        <header class="bg-neutral text-white py-4">
            <div class="container mx-auto">       
            <div class="flex justify-between"> 
                <!--logo-->
                <a href="/"> <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto" /> </a>
                <!--search box-->
                <input type="text" placeholder="Search for our products here. . ." class="input input-bordered w-100 text-black " />
                <!--nav items-->
                <ul class ="flex justify-end items-center font-bold space-x-5 tracking-wide">
                    <a class="btn btn-ghost text-lg" href="/">Home</a>
                    <a class="btn btn-ghost text-lg" href="/shop">Shop</a>
                    <a class="btn btn-ghost text-lg" href="/customerSupport">Help</a>
                    <a class="btn btn-ghost text-lg" href="/aboutUs">About</a>
                    <a class="btn btn-ghost text-lg" href="/login"> <span class="material-symbols-outlined">person</span> </a>
                    <a class="btn btn-ghost text-lg" href="/basket"> <span class="material-symbols-outlined">shopping_cart</span> </a>
                </ul>
        </header>

         <!--space for the page's content. Implemented using balde and tailwind classes-->
        <main class="container mx-auto px-4 min-h-screen pt-10">
        {{ $slot }}
        </main>


   </body>


    <!--footer -->
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