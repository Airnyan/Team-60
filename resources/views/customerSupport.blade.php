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
    <div class="hero bg-base-200 h-100 border border-gray-300 shadow-sm mb-2">
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
    </div>

    <!--Heading-->
    <div class="bg-neutral text-white py-4 text-center text-4xl font-bold mb-2"> 
        <h1>FAQS SECTION</h1>
    </div>

    <!--FAQs Section-->
    <div class="border border-gray-300 shadow-sm"> 
        <!--FAQs Question 1-->
        <div class="collapse bg-base-100 border border-base-300">
            <input type="radio" name="my-accordion-1" checked="checked" />
            <div class="collapse-title font-semibold">How do I create an account?</div>
            <div class="collapse-content text-sm">Click on the account icon at the right-hand side of the navbar and then follow the registration process.</div>
        </div>
        <!--FAQs Question 2-->
        <div class="collapse bg-base-100 border border-base-300">
            <input type="radio" name="my-accordion-1" checked="checked" />
            <div class="collapse-title font-semibold">Do you ship internationally?</div>
            <div class="collapse-content text-sm">Unfortunately we don't ship outside the UK at the moment. However you may use third party proxy shipment to buy our products.</div>
        </div>
        <!--FAQs Question 3-->
        <div class="collapse bg-base-100 border border-base-300">
            <input type="radio" name="my-accordion-1" checked="checked" />
            <div class="collapse-title font-semibold">What are your customer service opening hours?</div>
            <div class="collapse-content text-sm">Our customer service team is available from Monday to Saturday from 9 am to 4 pm. However, you can always contact us through the email form and we will get back to you in less than three working days.</div>
        </div>
        <!--FAQs Question 4-->
        <div class="collapse bg-base-100 border border-base-300">
            <input type="radio" name="my-accordion-1" checked="checked" />
            <div class="collapse-title font-semibold">The item I want to buy is out of stock. When will it be restocked?</div>
            <div class="collapse-content text-sm">We regularly restock our inventory every few months unless the item was for limited period.</div>
        </div>

    </div>


</x-layout>


