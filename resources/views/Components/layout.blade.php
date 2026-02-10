<!-- -->
<!DOCTYPE html>
<!--lang specifies the language of the content-->
<html lang="en">
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
                    <!--nav items on the left-->
                    <div class="flex items-center gap-5">
                        <!--logo-->
                        <a href="/"> <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-12 w-auto" /> </a>
                        <h1 class="font-bold text-xl">LITTLE GREEN MEN</h1>
                        <!--search box-->
                        <!-- <input type="text" placeholder="Search for our products here. . ." class="input input-bordered w-80 text-neutral" /> -->
                    </div>
                    <!--nav items on the right-->
                    <ul class ="flex justify-end items-center font-bold space-x-5 tracking-wide">
                        <a class="btn btn-ghost text-lg" href="/">HOME</a>
                        <a class="btn btn-ghost text-lg" href="/shop">SHOP</a>
                        <a class="btn btn-ghost text-lg" href="/customerSupport">HELP</a>
                        <a class="btn btn-ghost text-lg" href="/aboutUs">ABOUT</a>
                        <!-- Admin Panel Icon — only visible for admin users -->
                        @auth
                            @if(auth()->user()->is_admin == 1)
                                <a href="{{ route('admin.products') }}"
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
                                <span class="text-green-400">Hi, {{ auth()->user()->name }}</span>

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


        

        

        <!--Chatbot (Work-In-Progress) -->

        <!--Chat Window-->
        <div class="card w-96 bg-base-100 shadow-sm fixed bottom-5 right-25">

            <!--Chat Header-->
            <div class="navbar justify-between shadow-sm rounded-t">    
                <div class="flex justify-between gap-5 items-center mx-4">
                    <!--Chatbot Avatar--> 
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full ring-2 ring-slate-200"><img alt="Chatbot Avatar" src="{{ asset('images/chatbot.png') }}" /></div>
                    </div>
                    <!--Heading-->
                    <p class="font-semibold text-lg">ChudBot</p>
                </div>
                <!--Close Button-->
                <div class="card-actions mx-4">
                <button class="btn btn-square btn-sm">
                    <span class="material-symbols-outlined">close</span>
                </button>
                </div>
            </div> 

            <!--Chat History-->
            <div class="card-body h-80 overflow-y-auto">
            <!--Chatbot Agent--> 
                <div class="chat chat-start">
                    <!--Chatbot Avatar--> 
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full ring-2 ring-slate-200"><img alt="Chatbot Avatar" src="{{ asset('images/chatbot.png') }}" /></div>
                    </div>
                    <!--Chatbot's Chat Bubble-->
                    <div class="chat-bubble">How can I help you today?</div>
                </div>

                <!--User--> 
                <div class="chat chat-end">
                    <!--User Avatar-->
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full ring-2 ring-slate-200"><img alt="Chatbot Avatar" src="{{ asset('images/user.png') }}" /></div>
                    </div>
                    <!--User's Chat Bubble-->
                    <div class="chat-bubble">I hate you!</div>
                </div>
            </div>

            <!--Chatbot Footer-->
            <div class="p-2 join">
                <!--Text Area-->
                <input type="text" class="input join-item w-full " placeholder="Type your message here" />
                <!--Send Button-->
                <button class="btn btn-square btn-md join-item">
                    <span class="material-symbols-outlined">send</span>
                </button>
            </div>

        </div>
        
        
        <!--Chat Button-->    
        <div class="fixed bottom-5 right-10"> 
            <label class="btn btn-circle btn-lg swap swap-rotate">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" />
                <!-- Open icon -->
                <span class="swap-off fill-current material-symbols-outlined">chat</span>
                <!-- Close icon -->
                <span class="swap-on fill-current material-symbols-outlined">chat_bubble_off</span>
            </label>
        </div>









    </body>




    <!--footer -->
    <footer class="bg-neutral text-white py-4 mt-4">
        <div class="container flex mx-auto items-center justify-between">
            <p>Copyright&copy; 2025 Little Green Men. All rights reserved.</p>

            <div class="flex justify-end items-center space-x-5">
                <a href="https://www.facebook.com/"> <img src="{{ asset('images/facebook.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
                <a href="https://www.tiktok.com/en-GB/"> <img src="{{ asset('images/tiktok.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
                <a href="https://www.instagram.com/"> <img src="{{ asset('images/instagram.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
                <a href="https://x.com/"> <img src="{{ asset('images/x.png') }}" alt="social media links" class="h-10 w-auto" /> </a>
            </div>
            
        </div>
    </footer>

</html>