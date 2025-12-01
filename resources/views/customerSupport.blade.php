{{-- 
    NOTE:
    You do not need to write any of the standard HTML code.
    It is already written in the views/components/layout.blade.php file.
    Just simply write your page content inside the <x-layout> tags.
--}}

<x-layout>

    <!--title page-->
    <x-slot:title>
        Customer Support Page
    </x-slot:title>

    
    <!--Hero Section-->
    <div class="hero bg-base-200 h-100 border border-gray-300 shadow-sm">
    <div class="hero-content text-center">
        <div class="max-w-md">
        <h1 class="text-5xl font-bold">Hi there!</h1>
        <p class="py-6 text-lg">
            How can we help you today? 
        </p>
        <p class="text-lg">
            You can find answers to the common questions in the FAQs section or contact us directly using form below. 
        </p>
    </div>
    </div>


</x-layout>


