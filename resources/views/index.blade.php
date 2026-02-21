
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
    <div class="text-neutral-content py-4 text-4xl font-bold mb-2 "> 
        <h1>LATEST DROPS</h1>
    </div>
    

    <!--Grid-->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-12 justify-items-center">
        <!--product-->
        <div class="cursor-pointer">
            <!--Image-->
            <div class=" max-w-60 shadow-xl rounded-2xl hover-3d overflow-hidden">
                <figure class="">
                    <a href="/shop"> <img src="{{ asset('images/grid1.png') }}" alt="product" /> </a>
                </figure>
            </div>
            <!--Body-->
            <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto bg-base-300 rounded-2xl hover:bg-base-300/40">
                <h2 class="text-base-content ">Matrrix Classic Tee</h2>
                <div class="flex justify-between items-center">
                    <p class="text-base-content font-semibold mt-1">£25</p>
                    <!--Rating-->
                    <div class="rating rating-xs">
                        <div class="mask mask-star-2 bg-primary" aria-label="1 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="2 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="3 star" aria-current="true"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="4 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="5 star"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--product-->
        <div class="cursor-pointer">
            <!--Image-->
            <div class="max-w-60 shadow-xl rounded-2xl hover-3d overflow-hidden">
                <figure class="">
                    <a href="/shop"> <img src="{{ asset('images/grid2.png') }}" alt="product" /> </a>
                </figure>
            </div>
            <!--Body-->
            <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto bg-base-300 rounded-2xl hover:bg-base-300/40">
                <h2 class="text-base-content ">Matrrix Classic Tee</h2>
                <div class="flex justify-between items-center">
                    <p class="text-base-content font-semibold mt-1">£25</p>
                    <!--Rating-->
                    <div class="rating rating-xs">
                        <div class="mask mask-star-2 bg-primary" aria-label="1 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="2 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="3 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="4 star" aria-current="true"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="5 star"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--product-->
        <div class="cursor-pointer">
            <!--Image-->
            <div class=" max-w-60 shadow-xl rounded-2xl hover-3d overflow-hidden">
                <figure class="">
                    <a href="/shop"> <img src="{{ asset('images/grid4.png') }}" alt="product" /> </a>
                </figure>
            </div>
            <!--Body-->
            <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto bg-base-300 rounded-2xl hover:bg-base-300/40">
                <h2 class="text-base-content ">Matrrix Classic Tee</h2>
                <div class="flex justify-between items-center">
                    <p class="text-base-content font-semibold mt-1">£25</p>
                    <!--Rating-->
                    <div class="rating rating-xs">
                        <div class="mask mask-star-2 bg-primary" aria-label="1 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="2 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="3 star" ></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="4 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="5 star" aria-current="true"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--product-->
        <div class="cursor-pointer">
            <!--Image-->
            <div class=" max-w-60 shadow-xl rounded-2xl hover-3d overflow-hidden">
                <figure class="">
                    <a href="/shop"> <img src="{{ asset('images/grid3.png') }}" alt="product" /> </a>
                </figure>
            </div>
            <!--Body-->
            <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto bg-base-300 rounded-2xl hover:bg-base-300/40">
                <h2 class="text-base-content ">Matrrix Classic Tee</h2>
                <div class="flex justify-between items-center">
                    <p class="text-base-content font-semibold mt-1">£25</p>
                    <!--Rating-->
                    <div class="rating rating-xs">
                        <div class="mask mask-star-2 bg-primary" aria-label="1 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="2 star" aria-current="true"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="3 star" ></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="4 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="5 star" ></div>
                    </div>
                </div>
            </div>
        </div>

        <!--product-->
        <div class="cursor-pointer">
            <!--Image-->
            <div class=" max-w-60 shadow-xl rounded-2xl hover-3d overflow-hidden">
                <figure class="">
                    <a href="/shop"> <img src="{{ asset('images/grid4.png') }}" alt="product" /> </a>
                </figure>
            </div>
            <!--Body-->
            <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto bg-base-300 rounded-2xl hover:bg-base-300/40">
                <h2 class="text-base-content ">Matrrix Classic Tee</h2>
                <div class="flex justify-between items-center">
                    <p class="text-base-content font-semibold mt-1">£25</p>
                    <!--Rating-->
                    <div class="rating rating-xs">
                        <div class="mask mask-star-2 bg-primary" aria-label="1 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="2 star" ></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="3 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="4 star"></div>
                        <div class="mask mask-star-2 bg-primary" aria-label="5 star" aria-current="true"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    






</x-layout>