
<x-layout>

    <!--title page-->
    <x-slot:title>
        Home Page
    </x-slot:title>

    <!--Carousel-->
    <div class="container mx-auto px-4 mt-10">
        <div class="hover-3d mb-10">
            <div class="carousel w-full rounded-md shadow-2xl border border-base-100">
            <div id="slide1" class="carousel-item relative w-full">
                <a href="/shop" class="block w-full"> 
                    <img src="{{ asset('images/slides/slide3.png') }}" alt="product" class="w-full"/> 
                </a>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide4" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_back_ios</span></a>
                <a href="#slide2" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <a href="/shop" class="block w-full"> 
                    <img src="{{ asset('images/slides/slide1.png') }}" alt="product" class="w-full"/> 
                </a>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide1" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_back_ios</span></a>
                <a href="#slide3" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <a href="/shop" class="block w-full"> 
                    <img src="{{ asset('images/slides/slide2.png') }}" alt="product" class="w-full"/> 
                </a>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide2" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_back_ios</span></a>
                <a href="#slide4" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <a href="/shop" class="block w-full"> 
                    <img src="{{ asset('images/slides/slide4.png') }}" alt="product" class="w-full"/> 
                </a>
                <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
                <a href="#slide3" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_back_ios</span></a>
                <a href="#slide1" class="btn btn-circle btn-primary"><span class="material-symbols-outlined">arrow_forward_ios</span></a>
                </div>
            </div>
            </div>
        </div>    
</div>

    <!--Content Wrapper-->
    <div class="container mx-auto px-4">

        <!--Heading-->
        <div class="hover-3d"> 
            <div class="mb-4 inline-flex items-center justify-center rounded-3xl bg-base-300 h-16 px-2">
                <h3 class="text-3xl text-neutral-content font-semibold">LATEST DROPS</h3>
            </div>
        </div>    

        <!--Grid-->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-12 justify-items-center">
            <!--product-->
            <div class="cursor-pointer group hover-3d max-w-60 shadow-xl rounded-2xl relative">
                <!--Container For 3D Effect-->
                <div class="rounded-2xl bg-base-300">
                    <!--Image-->
                    <div class="rounded-t-2xl overflow-hidden">
                        <figure class="">
                            <a href="/shop"> <img src="{{ asset( $homepage[1]->image) }}" alt="product"/> </a>
                        </figure>
                    </div>
                    <!--Body-->
                    <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto rounded-2xl">
                        <h2 class="text-base-content ">{{$homepage[1]->product_name}}</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-base-content font-semibold mt-1">£{{$homepage[1]->price}}</p>
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
                <!-- 8 empty divs needed for the 3D effect -->
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>        

            <!--product-->
            <div class="cursor-pointer group hover-3d max-w-60 shadow-xl rounded-2xl relative">
                <!--Container For 3D Effect-->
                <div class="rounded-2xl bg-base-300">
                    <!--Image-->
                    <div class="rounded-t-2xl overflow-hidden">
                        <figure class="">
                            <a href="/shop"> <img src="{{ asset( $homepage[6]->image) }}" alt="product"/> </a>
                        </figure>
                    </div>
                    <!--Body-->
                    <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto rounded-2xl">
                        <h2 class="text-base-content ">{{$homepage[6]->product_name}}</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-base-content font-semibold mt-1">£{{$homepage[6]->price}}</p>
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
                <!-- 8 empty divs needed for the 3D effect -->
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>   

            <!--product-->
            <div class="cursor-pointer group hover-3d max-w-60 shadow-xl rounded-2xl relative">
                <!--Container For 3D Effect-->
                <div class="rounded-2xl bg-base-300">
                    <!--Image-->
                    <div class="rounded-t-2xl overflow-hidden">
                        <figure class="">
                            <a href="/shop"> <img src="{{ asset( $homepage[12]->image) }}" alt="product"/> </a>
                        </figure>
                    </div>
                    <!--Body-->
                    <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto rounded-2xl">
                        <h2 class="text-base-content ">{{$homepage[12]->product_name}}</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-base-content font-semibold mt-1">£{{$homepage[12]->price}}</p>
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
                <!-- 8 empty divs needed for the 3D effect -->
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>  

            <!--product-->
            <div class="cursor-pointer group hover-3d max-w-60 shadow-xl rounded-2xl relative">
                <!--Container For 3D Effect-->
                <div class="rounded-2xl bg-base-300">
                    <!--Image-->
                    <div class="rounded-t-2xl overflow-hidden">
                        <figure class="">
                            <a href="/shop"> <img src="{{ asset( $homepage[18]->image) }}" alt="product"/> </a>
                        </figure>
                    </div>
                    <!--Body-->
                    <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto rounded-2xl">
                        <h2 class="text-base-content ">{{$homepage[18]->product_name}}</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-base-content font-semibold mt-1">£{{$homepage[18]->price}}</p>
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
                <!-- 8 empty divs needed for the 3D effect -->
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>   

            <!--product-->
            <div class="cursor-pointer group hover-3d max-w-60 shadow-xl rounded-2xl relative">
                <!--Container For 3D Effect-->
                <div class="rounded-2xl bg-base-300">
                    <!--Image-->
                    <div class="rounded-t-2xl overflow-hidden">
                        <figure class="">
                            <a href="/shop"> <img src="{{ asset( $homepage[20]->image) }}" alt="product"/> </a>
                        </figure>
                    </div>
                    <!--Body-->
                    <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto rounded-2xl">
                        <h2 class="text-base-content ">{{$homepage[20]->product_name}}</h2>
                        <div class="flex justify-between items-center">
                            <p class="text-base-content font-semibold mt-1">£{{$homepage[20]->price}}</p>
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
                <!-- 8 empty divs needed for the 3D effect -->
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div> 
        </div>
        

        <!--Heading-->
        <div class="hover-3d"> 
            <div class="mb-4 inline-flex items-center justify-center rounded-3xl bg-base-300 h-16 px-2">
                <h3 class="text-3xl text-neutral-content font-semibold">FLASH SALE</h3>
            </div>
        </div>    

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-12 justify-items-center">
            
            <!--product-->
            <div class="cursor-pointer group hover-3d max-w-60 shadow-xl rounded-2xl relative">
                <!--Container For 3D Effect-->
                <div class="rounded-2xl bg-base-300">
                    <!--Image-->
                    <div class="rounded-t-2xl overflow-hidden">
                        <figure class="">
                            <a href="/shop"> <img src="{{ asset( $homepage[10]->image) }}" alt="product"/> </a>
                        </figure>
                    </div>
                    <!--Body-->
                    <div class="flex flex-col mt-1 px-3 pt-1 pb-1.5 h-auto rounded-2xl">
                        <h2 class="text-base-content ">{{$homepage[10]->product_name}}</h2>
                        <div class="flex justify-between items-center">
                            <div class="flex gap-2">
                            <p class="text-base-content font-semibold mt-1 line-through">£{{$homepage[10]->price}}</p>
                            <p class="text-base-content font-semibold mt-1">£{{$homepage[10]->discounted_price}}</p>
                            </div>
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
                <!-- 8 empty divs needed for the 3D effect -->
                <div></div><div></div><div></div><div></div>
                <div></div><div></div><div></div><div></div>
            </div>


            



            
        </div>
    </div>

    

</x-layout>