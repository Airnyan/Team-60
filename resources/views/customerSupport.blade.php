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
    <div class="border border-gray-300 shadow-sm mb-2"> 
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


    <!--Heading-->
    <div class="bg-neutral text-white py-4 text-center text-4xl font-bold"> 
        <h1>CONTACT FORM</h1>
    </div>


    <!--Form-->

    <!--Input Field 1-->
    <form action="/contact-submit" method="POST" >
        @csrf <fieldset class="fieldset">
            <legend class="fieldset-legend text-lg">Name</legend>
            <input 
                name="name"
                type="text" 
                required
                class="w-full input validator" 
                placeholder="Type your name here" 
                pattern="[A-Za-z\s]+"
                minlength="1"
                maxlength="30"
                title="Only letters"   
            />
            <p class="validator-hint hidden">Enter a valid name. Cannot contain special characters or numbers.</p>
        </fieldset>

        <!--Input Field 2-->
        <fieldset class="fieldset">
            <legend class="fieldset-legend text-lg">Email</legend>
            <input 
                name="email"
                type="email" 
                class="input w-full validator" 
                placeholder="Type your email here" 
                required
            />
            <p class="validator-hint hidden">Enter valid email address. Acceptable format: mail@site.com</p>
        </fieldset>

        <!--Input Field 3-->
        <fieldset class="fieldset">
            <legend class="fieldset-legend text-lg">Mobile Number</legend>
            <input 
                name="mobile_number"
                type="tel" 
                class="input w-full validator" 
                placeholder="Type your mobile number here" 
                pattern="[0-9]*"
                minlength="11"
                maxlength="11"
                title="Must be 11 digits"
            />
            <p class="label text-base">(Optional)</p>
            <p class="validator-hint hidden">Must be 11 digits. Acceptable format: 07123456789</p>
        </fieldset>

        <!--Input Field 4-->
        <fieldset class="fieldset">
            <legend class="fieldset-legend text-lg">Order Number</legend>
            <input 
                name="order_number"
                type="text" 
                class="input w-full validator" 
                placeholder="Type your order number here" 
                required
                pattern="[0-9]*"
                minlength="5"
                maxlength="5"
                title="Must be 5 digits long"
            />
            <p class="validator-hint hidden">Must be 5 digits long. Cannot contain letters or special characters.</p>
        </fieldset>

        <!--Input Field 5-->
        <fieldset class="fieldset">
            <legend class="fieldset-legend text-lg">Message</legend>
            <textarea 
                name="message"
                class="textarea w-full h-20 validator" 
                placeholder="Type your message here" 
                required></textarea>
        </fieldset>



        <!--Submit Button-->
        <button class="btn btn-neutral text-white mt-4 mb-4">Submit</button>

    </form>

    <!--Successfull Submission Message-->
    <!--Check the controller for any issues-->
    @if(session()->has("message"))

    <div role="alert" class="alert alert-success font-bold">
        {{session()->get("message")}}
    </div>

    @endif






</x-layout>


