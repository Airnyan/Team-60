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
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Inter:wght@300;400;600;700&family=Lexend:wght@100..900&display=swap" rel="stylesheet">    <!--link to tailwind files-->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/chatbot.js', 'resources/js/accessibility.js','resources/css/styles.css'])
    <!--css code for the accessiblity mouse-->
    <style>
        html.big-cursor * {
            cursor: url("{{ asset('images/icons/cursor.png') }}"), auto;
        }
        body#body {
            background-image: url("{{ asset('images/bg.png') }}");
        }
        header#nav-header {
        background-image: url("{{ asset('images/navbar.jpg') }}");
        }
        footer#footer {
            background-image: url("{{ asset('images/navbar.jpg') }}");
        }
        @font-face {
            font-family: 'OpenDyslexic';
            src: url("/fonts/OpenDyslexic-Regular.otf") format('opentype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>

<body id="body" class="bg-base-200 bg-cover bg-center bg-no-repeat bg-fixed">
    <!--Navbar-->
    <header id="nav-header" class="bg-base-100 text-neutral-content py-4 border-3 border-base-300 shadow-2xl">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row flex-wrap justify-center lg:justify-between items-center gap-4">
                <!--nav items on the left-->
                <div class="flex items-center">
                    <!--logo-->
                    <div class="flex flex-wrap items-center gap-1">
                        <!--<img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-8 w-auto" />-->
                        <a class="btn btn-primary btn-ghost text-xl" href="/">
                            <span>LITTLE GREEN MAN</span>
                        </a>
                    </div>
                </div>
                <!--nav items on the right-->
                <ul class="flex flex-wrap justify-center items-center font-bold gap-2 lg:gap-4 tracking-wide">
                    <a class="btn btn-ghost text-base lg:text-lg hover:bg-base-300" href="/">HOME</a>
                    <!--dropdown menu for shop page-->
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost text-lg hover:bg-base-300 m-1">SHOP</div>
                        <ul tabindex="-1" class="dropdown-content menu bg-base-200 rounded-box z-1 mt-5 w-52 p-2 shadow-sm">
                            
                            <li><a class="text-lg hover:bg-base-300 m-1" href="/shop">Main Page</a></li>
                            <li><a class="text-lg hover:bg-base-300 m-1" href="/shop?category=1">T-shirt</a></li>
                            <li><a class="text-lg hover:bg-base-300 m-1" href="/shop?category=2">Hoodie</a></li>
                            <li><a class="text-lg hover:bg-base-300 m-1" href="/shop?category=3">Tracksuit</a></li>
                            <li><a class="text-lg hover:bg-base-300 m-1" href="/shop?category=4">Hat</a></li>
                            <li><a class="text-lg hover:bg-base-300 m-1" href="/shop?category=5">Poster</a></li>
                        </ul>
                    </div>
                    <a class="btn btn-ghost text-base lg:text-lg hover:bg-base-300" href="/customerSupport">HELP</a>
                    <a class="btn btn-ghost text-base lg:text-lg hover:bg-base-300" href="/aboutUs">ABOUT</a>

                    <!-- Admin Panel Icon — only visible for admin users -->
                    @auth
                    @if((in_array(Auth::user()->role, ['admin', 'super_admin'])))
                    <a href="{{ route('admin.dashboard') }}"
                        class="btn btn-outline flex items-center gap-2 btn-primary">
                        <span class="material-symbols-outlined">dashboard</span>
                        Admin
                    </a>
                    @endif
                    @endauth
                    
                    <!-- Account Icon -->
                    @guest
                    <a class="btn btn-ghost text-lg btn-primary" href="/login">
                        <span class="material-symbols-outlined">person</span>
                    </a>
                    @endguest

                    @auth
                    <div class="dropdown dropdown-end">

                        <!-- Avatar Circle -->
                        <div tabindex="0" role="button" 
                            class="btn btn-ghost btn-circle avatar bg-green-500 text-white font-bold">
                            
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <!-- Dropdown Menu -->
                        <ul tabindex="0"
                            class="dropdown-content menu bg-base-100 text-white rounded-box z-1 mt-3 w-40 p-2 shadow">

                            <li>
                                <a href="{{ route('profile') }}">
                                    Profile Page
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('orders.index') }}">
                                    My Orders
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
                    @endauth

                    <a class="btn btn-ghost text-lg btn-primary" href="/basket"> <span class="material-symbols-outlined">shopping_cart</span> </a>
                </ul>
            </div>
        </div>
    </header>

    <!--space for the page's content. Implemented using balde and tailwind classes-->
    <main class="min-h-screen">
        {{ $slot }}
    </main>


    <!--Chat Window-->
    <div id="chatWindow" class="hidden">
    <div class="card w-96 bg-base-200 shadow-md fixed bottom-5 right-25 rounded-2xl overflow-hidden border-3 border-base-300 z-50">
        <!--Chat Header-->
        <div class="navbar bg-base-100 justify-between rounded-t">
        <div class="flex justify-between gap-5 items-center mx-4">
            <!--Chatbot Avatar-->
            <div class="chat-image avatar">
                <div class="w-10 rounded-full border">
                    <img alt="Chatbot Avatar" src="{{ asset('images/chatbot.png') }}" />
                </div>
            </div>
            <!--Heading-->
            <p class="text-neutral-content font-semibold text-lg">ChatBot</p>
            </div>
            <!--Top Right Header Items-->
            <div class="flex items-center">
                <!--Close Button-->
                <div id="innerCloseChatButton" class="card-actions">
                    <img alt="Mimisise Icon" src="{{ asset('images/icons/minimise.png') }}" class="  hover:bg-primary/40 rounded-sm" />
                </div> 
                <!--Close Button-->
                <div id="innerMinimiseChatButton" class="card-actions mx-4 ">
                    <img alt="Close Icon" src="{{ asset('images/icons/close.png') }}" class="  hover:bg-primary/40 rounded-sm" />
                </div>
            </div>      
        </div>

        <!--Chat Body-->
        <div id="chatBody" class="card-body h-85 overflow-y-scroll overflow-hidden">
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
    <div class="fixed bottom-5 right-1 hover-3d z-50">
        <label class="btn btn-circle btn-lg btn-primary swap swap-rotate border-2 border-base-200">
            <!-- this hidden checkbox controls the state -->
            <input id="chatButton" type="checkbox"/>
            <!-- Open icon -->
            <span class="swap-off fill-current material-symbols-outlined">chat</span>
            <!-- Close icon -->
            <span class="swap-on fill-current material-symbols-outlined">chat_bubble_off</span>
        </label>
    </div>








    <!--Accessibilty Button-->
    <div class="fixed bottom-5 left-1 hover-3d z-50">
        <label class="btn btn-circle btn-lg btn-primary swap swap-rotate border-2 border-base-200">
            <!-- this hidden checkbox controls the state -->
            <input id="accessibiltyButton" type="checkbox"/>
            <!-- Open icon -->
            <span class="swap-off fill-current material-symbols-outlined">accessibility</span>
            <!-- Close icon -->
            <span class="swap-on fill-current material-symbols-outlined">close</span>
        </label>
    </div>

    <!--Accessibilty Menu-->
    <div id="accessibiltyWindow" class="hidden">

        <div class="card w-96 bg-base-200 shadow-md fixed bottom-5 left-25 rounded-2xl overflow-hidden border-3 border-base-300 z-50">
            <!--Chat Header-->
            <div class="navbar bg-base-100 justify-between rounded-t">
            <div class="flex justify-between gap-5 items-center mx-4">
                <!--Heading-->
                <p class="text-neutral-content font-semibold text-lg">Accessibility Features</p>
                </div>
                <!--Top Right Header Items-->
                <div class="flex items-center">
                    <!--Close Button-->
                    <div id="headerCloseButton" class="card-actions mx-4 ">
                        <img alt="Close Icon" src="{{ asset('images/icons/close.png') }}" class="  hover:bg-primary/40 rounded-sm" />
                    </div>
                </div>      
            </div>

            <!--Window Body-->
            <div class="card-body h-100 overflow-y-scroll overflow-hidden">
                <div class="grid grid-cols-2 gap-8">
                    <!--"has" css property can look into the child element-->
                    <label class="btn h-24 bg-base-300 has-checked:bg-primary has-checked:text-base-100 flex flex-col gap-4">
                        <span class="material-symbols-outlined">text_increase</span>   
                        Large Text
                        <input id="largeTextButton" type="checkbox" class="hidden" />
                    </label>
                    <!--"has" css property can look into the child element-->
                    <label class="btn h-24 bg-base-300 has-checked:bg-primary has-checked:text-base-100 flex flex-col gap-2">
                        <span class="material-symbols-outlined">font_download</span>   
                        Clear Font
                        <input id="fontChangeButton" type="checkbox" class="hidden" />
                    </label>
                    <!--"has" css property can look into the child element-->
                    <label class="btn h-24 bg-base-300 has-checked:bg-primary has-checked:text-base-100 flex flex-col gap-4">
                        <span class="material-symbols-outlined">format_letter_spacing</span>   
                        Text Spacing
                        <input id="spacingButton" type="checkbox" class="hidden" />
                    </label>                    
                    <!--"has" css property can look into the child element-->
                    <label class="btn h-24 bg-base-300 has-checked:bg-primary has-checked:text-base-100 flex flex-col gap-4">
                        <span class="material-symbols-outlined">invert_colors</span>   
                        High Contrast
                        <input id="contrastButton" type="checkbox" value="high-contrast"  class="hidden theme-controller" />
                    </label>
                    <!--"has" css property can look into the child element-->
                    <label class="btn h-24 bg-base-300 has-checked:bg-primary has-checked:text-base-100 flex flex-col gap-4">
                        <span class="material-symbols-outlined">arrow_selector_tool</span>   
                        Big Cursor
                        <input id="mousetButton" type="checkbox" class="hidden" />
                    </label>                    
                </div>
            </div>



        </div> 
    </div>



</body>




<!-- New footer-->
<footer id="footer" class="footer sm:footer-horizontal bg-base-100 text-neutral-content items-center p-4 border-3 border-base-300 shadow-2xl">
    <div class="container flex mx-auto items-center justify-between">
        <!--Logo-->
        <div class="hover-3d">
            <aside class="grid-flow-col items-center">
                <span class="text-lg" style="font-family: 'Exo 2';">LITTLE GREEN MAN</span>
                <p>Copyright© 2026 - All right reserved</p>
            </aside>
        </div>
        <!--Social Links-->
        <nav class="flex justify-end items-center space-x-5">
            <div class="hover-3d"> <a href="https://www.facebook.com/"> <img src="{{ asset('images/icons/facebook.png') }}" alt="social media links" class="h-10 w-auto" /> </a> </div>
            <div class="hover-3d"> <a href="https://www.tiktok.com/en-GB/"> <img src="{{ asset('images/icons/tiktok.png') }}" alt="social media links" class="h-10 w-auto" /> </a> </div>
            <div class="hover-3d"> <a href="https://www.instagram.com/"> <img src="{{ asset('images/icons/instagram.png') }}" alt="social media links" class="h-10 w-auto" /> </a> </div>
            <div class="hover-3d"> <a href="https://x.com/"> <img src="{{ asset('images/icons/x.png') }}" alt="social media links" class="h-10 w-auto" /> </a> </div>
        </nav>
    </div>
</footer>

</html>