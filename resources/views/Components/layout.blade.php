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
        <header> 
            <nav>
                <a href="/">Home</a>
                <a href="/shop">Shop</a>
                <a href="/basket">Basket</a>
                <a href="/customerSupport">Customer Support</a>
                <a href="/aboutUs">About Us</a>
                <a href="/login">Login</a>
                <a href="/signUp">Signup</a>
            </nav>
        </header>

         <!--space for the other pages's content. Implemented using balde.-->
        {{ $slot}}

        <!--java script connection-->
        <script src=""></script>
   </body>


    <!--footer-->
    <footer>
        <br>
        <br>
        <p>Footer:</p>
        <p>Contact Information<br>
        <a href="mailto:customerservice@LittleGreenMen.com">customerservice@LittleGreenMen.com</a></p>

        <div>
            <p>Social Media Links</p>
            <p><a href="#">Facebook</a></p>
            <p><a href="#">Instagram</a></p>
            <p><a href="#">Twitter</a></p>
        </div>

        <p>© 2025 Littel Green Men. All Rights Reserved</p>
    </footer>

</html>