{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>

    <!--title page-->
    <x-slot:title>
        Home Page
    </x-slot:title>

    <!--Testing new carousel-->
    <div class="carousel w-full border border-gray-300 shadow-sm">
    <div id="slide1" class="carousel-item relative w-full">
        <img src="{{ asset('images/slide1.png') }}" class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide4" class="btn btn-circle">❮</a>
        <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide2" class="carousel-item relative w-full">
        <img src="{{ asset('images/slide2.png') }}" class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide1" class="btn btn-circle">❮</a>
        <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide3" class="carousel-item relative w-full">
        <img src="{{ asset('images/slide3.png') }}" class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide2" class="btn btn-circle">❮</a>
        <a href="#slide4" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide4" class="carousel-item relative w-full">
        <img src="{{ asset('images/slide4.png') }}" class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide3" class="btn btn-circle">❮</a>
        <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
    </div>
    </div>

    <!--latest release section-->
    <div class="bg-neutral text-white py-4 text-center text-4xl font-bold mb-2"> 
        <h1>LATEST DROPS</h1>
    </div>
    

    <!--grid-->
    <div class="flex justify-between">
        <!--product-->
        <div class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <a href="#"> <img src="{{ asset('images/grid1.png') }}" alt="product" /> </a>
            </figure>
            <div class="bg-neutral card-body items-center py-2 rounded-b-sm">
                <p class="font-bold text-lg text-white">MATRIX TEE</p>
            </div>
        </div>

        <!--product-->
        <div class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <a href="#"> <img src="{{ asset('images/grid2.png') }}" alt="product" /> </a>
            </figure>
            <div class="bg-neutral card-body items-center py-2 rounded-b-sm">
                <p class="font-bold text-lg text-white">BATTLE TEE</p>
            </div>
        </div>

        <!--product-->
        <div class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <a href="#"> <img src="{{ asset('images/grid3.png') }}" alt="product" /> </a>
            </figure>
            <div class="bg-neutral card-body items-center py-2 rounded-b-sm">
                <p class="font-bold text-lg text-white">BATTLE TEE</p>
            </div>
        </div>

    </div>
    






</x-layout>