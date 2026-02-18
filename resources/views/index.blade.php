
<x-layout>

    <!--title page-->
    <x-slot:title>
        Home Page
    </x-slot:title>

    <!--Carousel-->
    <div class="carousel w-full border border-base-300 shadow-sm mb-5 rounded-2xl">
    <div id="slide1" class="carousel-item relative w-full">
        <a href="/shop"> <img src="{{ asset('images/slide1.png') }}" class="w-full block" /></a>
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide4" class="btn btn-circle">❮</a>
        <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide2" class="carousel-item relative w-full">
        <a href="/shop"> <img src="{{ asset('images/slide2.png') }}" class="w-full block" /></a>
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide1" class="btn btn-circle">❮</a>
        <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide3" class="carousel-item relative w-full">
        <a href="/shop"> <img src="{{ asset('images/slide3.png') }}" class="w-full block" /></a>
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide2" class="btn btn-circle">❮</a>
        <a href="#slide4" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide4" class="carousel-item relative w-full">
        <a href="/shop"> <img src="{{ asset('images/slide4.png') }}" class="w-full block" /></a>
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide3" class="btn btn-circle">❮</a>
        <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
    </div>
    </div>

    <!--Heading-->
    <div class="text-neutral-content py-4 text-4xl font-bold mb-2"> 
        <h1>LATEST DROPS</h1>
    </div>
    

    <!--grid-->
    <div class="flex justify-between gap-5 mb-10">
        <!--product-->
        <div class="card bg-base-100 w-96 shadow-sm border-base-300">
            <figure>
                <a href="/shop"> <img src="{{ asset('images/grid1.png') }}" alt="product" /> </a>
            </figure>
            <div class="bg-base-300 card-body items-center py-2 rounded-b-sm text-neutral-content">
                <p class="font-bold text-lg">MATRIX TEE</p>
            </div>
        </div>

        <!--product-->
        <div class="card bg-base-100 w-96 shadow-sm border-base-300">
            <figure>
                <a href="/shop"> <img src="{{ asset('images/grid2.png') }}" alt="product" /> </a>
            </figure>
            <div class="bg-base-300 card-body items-center py-2 rounded-b-sm text-neutral-content">
                <p class="font-bold text-lg">BATTLE TEE</p>
            </div>
        </div>

        <!--product-->
        <div class="card bg-base-100 w-96 shadow-sm border-base-300">
            <figure>
                <a href="/shop"> <img src="{{ asset('images/grid3.png') }}" alt="product" /> </a>
            </figure>
            <div class="bg-base-300 card-body items-center py-2 rounded-b-sm text-neutral-content">
                <p class="font-bold text-lg">BATTLE TEE</p>
            </div>
        </div>

    </div>
    






</x-layout>