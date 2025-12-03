{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>

    <!--title page-->
    <x-slot:title>
        About Page
    </x-slot:title>

    <!--Hero Section-->
    <div class="hero bg-base-200 h-100 border border-gray-300 shadow-sm mb-2">
    <div class="hero-content text-center">
        <div class="max-w-md">
        <h1 class="text-5xl font-bold">About Us!</h1>
        <p class="py-6 text-lg">
            Care to learn about our company?  
        </p>
        <p class="text-lg">
            Please see the section below highlighting our company ambitions and history!
        </p>
    </div>
    </div>
    </div>

    <!--Section Heading-->
    <div class="bg-neutral text-white py-4 text-center text-4xl font-bold mb-2"> 
        <h1>LITTLE GREEN MAN</h1>
    </div>

    <!--TextArea-->
    <div class="bg-base-200 border border-gray-300 shadow-sm px-10 py-10">
        <p class=" text-lg">
        Little Green Man! is a independent merchandise company based in Birmingham run managed by group of friends. We got started in 2025 with one goal in mind to sell kind of merchandise we want to own. Our merchandise are designed in house by our talented team of designers, mostly inspired by video games and anime. We sell tees, hoodies, sweatpants, trousers, and plenty more accessories.
        </p>
    </div>


</x-layout>
