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
    <div class="carousel w-full">
    <div id="slide1" class="carousel-item relative w-full">
        <img
        src="{{ asset('images/slide1.png') }}"
        class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide4" class="btn btn-circle">❮</a>
        <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide2" class="carousel-item relative w-full">
        <img
        src="{{ asset('images/slide2.png') }}"
        class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide1" class="btn btn-circle">❮</a>
        <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide3" class="carousel-item relative w-full">
        <img
        src="{{ asset('images/slide3.png') }}"
        class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide2" class="btn btn-circle">❮</a>
        <a href="#slide4" class="btn btn-circle">❯</a>
        </div>
    </div>
    <div id="slide4" class="carousel-item relative w-full">
        <img
        src="{{ asset('images/slide4.png') }}"
        class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
        <a href="#slide3" class="btn btn-circle">❮</a>
        <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
    </div>
    </div>







</x-layout>