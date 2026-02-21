<!-- -->
@props(['title' => 'Little GreenMan Store'])

<!DOCTYPE html>
<!--lang specifies the language of the content-->
<html lang="en" data-theme="mytheme">
<link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
<!--head tag is a container for metadata-->
<head>
    <!--encoding type-->
    <meta charset="UTF-8">
    <!--for proper scaling-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--title page-->
    <title>{{$title ?? 'Little GreenMan Store'}}</title>
    <!--link to Google Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--link to Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!--link to tailwind files-->
    @vite(['resources/css/app.css', 'resources/js/response.js', 'resources/js/app.js','resources/js/chatbot.js'])

</head>

<body class="bg-base-200">
    <!--Navbar-->
    <header class="bg-base-100 text-neutral-content py-4">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center sm:justify-between">
                <!--nav items on the left-->
                <div class="flex items-center gap-5">
                    <!--logo-->
                    <div class="">
                        <a class="btn btn-ghost text-xl btn-primary" href="/">
                            <!--<img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-8 w-auto" />-->
                            <span style="font-family: 'Exo 2';">LITTLE GREEN MAN</span>
                        </a>
                    </div>
                </div>
                <!--nav items on the right-->
                <ul class="flex flex-wrap justify-center sm:justify-between items-center font-bold space-x-5 tracking-wide">
                    <a class="btn btn-ghost text-lg" href="/">HOME</a>
                    <a class="btn btn-ghost text-lg" href="/shop">SHOP</a>
                    <a class="btn btn-ghost text-lg" href="/customerSupport">HELP</a>
                    <a class="btn btn-ghost text-lg" href="/aboutUs">ABOUT</a>
                    <!-- Admin Panel Icon — only visible for admin users -->
                    @auth
                    @if((in_array(Auth::user()->role, ['admin', 'super_admin'])))
                    <a href="{{ route('admin.dashboard') }}"
                        class="btn btn-outline btn-success flex items-center gap-2">
                        <span class="material-symbols-outlined">dashboard</span>
                        Admin
                    </a>
                    @endif
                    @endauth

                    <!-- Account Icon -->
                    @guest
                    <a class="btn btn-ghost text-lg" href="/login">
                        <span class="material-symbols-outlined">person</span>
                    </a>
                    @endguest

                    @auth
                    <div class="flex items-center gap-3">
                        <span class="text-success">Hi, {{ auth()->user()->name }}</span>

                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-ghost text-lg">
                                <span class="material-symbols-outlined">logout</span>
                            </button>
                        </form>
                    </div>
                    @endauth
                    <a class="btn btn-ghost text-lg" href="/basket"> <span class="material-symbols-outlined">shopping_cart</span> </a>
                </ul>
            </div>
        </div>
    </header>

    <!--space for the page's content. Implemented using balde and tailwind classes-->
    <main class="container mx-auto px-4 min-h-screen pt-10">
        {{ $slot }}
    </main>


    <!--Chat Window-->
    <div id="chatWindow" class="hidden ">
    <div class="card w-96 bg-base-200 shadow-md fixed bottom-5 right-25 rounded-2xl overflow-hidden border border-base-100">
        <!--Chat Header-->
        <div class="navbar bg-base-100 justify-between rounded-t">
        <div class="flex justify-between gap-5 items-center mx-4">
            <!--Chatbot Avatar-->
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img alt="Chatbot Avatar" src="{{ asset('images/chatbot2.png') }}" />
                </div>
            </div>
            <!--Heading-->
            <p class="text-neutral-content font-semibold text-lg">ChudBot</p>
            </div>
            <!--Top Right Header Items-->
            <div class="flex items-center">
                <!--Close Button-->
                <div id="innerCloseChatButton" class="card-actions">
                    <img alt="Mimisise Icon" src="{{ asset('images/minimise.png') }}" class="  hover:bg-primary/40 rounded-sm" />
                </div> 
                <!--Close Button-->
                <div id="innerMinimiseChatButton" class="card-actions mx-4 ">
                    <img alt="Close Icon" src="{{ asset('images/close.png') }}" class="  hover:bg-primary/40 rounded-sm" />
                </div>
            </div>      
        </div>

        <!--Chat Body-->
        <div id="chatBody" class="card-body h-80 overflow-y-scroll overflow-hidden">
            <!--loading icon-->
            <span id="loadIcon" class="loading loading-dots loading-xl hidden"></span>
            <!--Agent-->
            <div class="chat chat-start">
                <!--Chatbot Avatar-->
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Chatbot Avatar" src="{{ asset('images/chatbot.png') }}" />
                    </div>
                </div>
                <!--Chatbot's Chat Bubble-->
                <div class="chat-bubble font-semibold">Hi there, how can I help you today?</div>
            </div>
        </div>
        
        <!--Chatbot Footer-->
        <div class="p-2 join ">
            <!--Text Area-->
            <input autocomplete="off" type="text" id="txtInput" class="input join-item w-full font-semibold bg-base-300 border-base-100" placeholder="Type your message here" />
            <!--Send Button-->
            <div>
                <button id="send" class="btn btn-square btn-md join-item bg-base-300 border-base-100">
                    <span class="material-symbols-outlined">send</span>
                </button>
            </div>
        </div>
    </div>
    </div>

    <!--Chat Button-->
    <div class="fixed bottom-5 right-10">
        <label class="btn btn-circle btn-lg swap swap-rotate bg-base-300 border-base-100">
            <!-- this hidden checkbox controls the state -->
            <input id="chatButton" type="checkbox"/>
            <!-- Open icon -->
            <span class="swap-off fill-current material-symbols-outlined">chat</span>
            <!-- Close icon -->
            <span class="swap-on fill-current material-symbols-outlined">chat_bubble_off</span>
        </label>
    </div>



</body>




<!-- New footer-->
<footer class="footer sm:footer-horizontal bg-base-100 text-neutral-content items-center p-4">
    <div class="container flex mx-auto items-center justify-between">
        <!--Logo-->
        <aside class="grid-flow-col items-center">
            <span class="text-lg" style="font-family: 'Exo 2';">LITTLE GREEN MAN</span>
            <p>Copyright© 2026 - All right reserved</p>
        </aside>
        <!--Social Links-->
        <nav class="flex justify-end items-center space-x-5">
            <a href="https://www.facebook.com/"> <img src="{{ asset('images/facebook.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
            <a href="https://www.tiktok.com/en-GB/"> <img src="{{ asset('images/tiktok.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
            <a href="https://www.instagram.com/"> <img src="{{ asset('images/instagram.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
            <a href="https://x.com/"> <img src="{{ asset('images/x.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
        </nav>
    </div>
</footer>

</html>