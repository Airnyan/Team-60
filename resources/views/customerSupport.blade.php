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

    <!--Content Wrapper-->
    <div class="container mx-auto px-4 pt-10">
        <!--Hero Section-->
        <div class="hover-3d hero">
            <div class="hero bg-base-300 h-100 border border-base-300 shadow-sm mb-2 rounded-2xl">
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
        </div>

        <!--Heading-->
        <div class="hover-3d"> 
            <div class="mb-4 mt-4 inline-flex items-center justify-center rounded-3xl bg-base-300 h-16 w-64">
                <h3 class="text-3xl text-neutral-content font-semibold">FAQ SECTION</h3>
            </div>
        </div>        

        <!--FAQs Section-->
        <div class="flex flex-col gap-2 mb-2">
            <!--FAQs Question 1-->
            <div class="hover-3d">
            <div class="collapse collapse-arrow bg-base-300 border border-base-200">
                <input type="radio" name="my-accordion-2" checked="checked" />
                <div class="collapse-title font-semibold">How do I create an account?</div>
                <div class="collapse-content text-sm">Click on the account icon at the right-hand side of the navbar and then follow the registration process.</div>
            </div>
            </div>
            <!--FAQs Question 2-->
            <div class="hover-3d">
                <div class="collapse collapse-arrow bg-base-300  border border-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">I forgot my password. What should I do?</div>
                    <div class="collapse-content text-sm">Click on "Forgot Password" on the login page and follow the instructions.</div>
                </div>
            </div>
            <!--FAQs Question 3-->
            <div class="hover-3d">
                <div class="collapse collapse-arrow bg-base-300  border border-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">How do I update my profile information?</div>
                    <div class="collapse-content text-sm">Go to "My Account" settings and select "Edit Profile" to make changes.</div>
                </div>
            </div>
            <!--FAQs Question 4-->
            <div class="hover-3d">
                <div class="collapse collapse-arrow bg-base-300  border border-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">How to contact the customer service?</div>
                    <div class="collapse-content text-sm">Fill out the form below and our customer service team will reach out to you soon.</div>
                </div>
            </div> 
            <!--FAQs Question 5-->
            <div class="hover-3d">
                <div class="collapse collapse-arrow bg-base-300  border border-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">How to track my order?</div>
                    <div class="collapse-content text-sm">To track the status of your order, please head to your account page.</div>
                </div>
            </div>
            <!--FAQs Question 6-->
            <div class="hover-3d">
                <div class="collapse collapse-arrow bg-base-300  border border-base-200">
                    <input type="radio" name="my-accordion-2" />
                    <div class="collapse-title font-semibold">Do you ship internationally?</div>
                    <div class="collapse-content text-sm">Unfortunately we don't ship outside the UK at the moment. However you may use third party proxy shipment to buy our products.</div>
                </div>
            </div>
        </div>


        <!--Heading-->
        <div class="hover-3d"> 
            <div class="mb-4 mt-4 inline-flex items-center justify-center rounded-3xl bg-base-300 h-16 w-74">
                <h3 class="text-3xl text-neutral-content font-semibold">CONTACT FORM</h3>
            </div>
        </div>

        <!--Form-->
        <div class="card bg-base-300 mb-10 border border-base-300"> 
            <div class="card-body"> 
                <!--Input Field 1-->
                <form action="/contact-submit" method="POST" >
                    @csrf <fieldset class="fieldset">
                        <legend class="fieldset-legend text-lg ">Name</legend>
                        <div class="hover-3d">
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
                        </div>
                        <p class="validator-hint hidden text-neutral-content">Enter a valid name. Cannot contain special characters or numbers.</p>
                    </fieldset>

                    <!--Input Field 2-->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-lg">Email</legend>
                        <div class="hover-3d">
                        <input 
                            name="email"
                            type="email" 
                            class="input w-full validator" 
                            placeholder="Type your email here" 
                            required
                        />
                        </div>
                        <p class="validator-hint hidden">Enter valid email address. Acceptable format: mail@site.com</p>
                    </fieldset>

                    <!--Input Field 3-->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-lg">Mobile Number</legend>
                        <div class="hover-3d">
                        <input 
                            name="mobile_number"
                            type="tel" 
                            class="input w-full validator  " 
                            placeholder="Type your mobile number here" 
                            pattern="[0-9]*"
                            minlength="11"
                            maxlength="11"
                            title="Must be 11 digits"
                        />
                        </div>
                        <p class="label text-base">(Optional)</p>
                        <p class="validator-hint hidden">Must be 11 digits. Acceptable format: 07123456789</p>
                    </fieldset>

                    <!--Input Field 4-->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-lg">Order Number</legend>
                        <div class="hover-3d">                
                        <input 
                            name="order_number"
                            type="text" 
                            class="input w-full validator  " 
                            placeholder="Type your order number here" 
                            required
                            pattern="[0-9]*"
                            minlength="5"
                            maxlength="5"
                            title="Must be 5 digits long"
                        />
                        </div>
                        <p class="validator-hint hidden">Must be 5 digits long. Cannot contain letters or special characters.</p>
                    </fieldset>

                    <!--Input Field 5-->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend text-lg">Message</legend>
                        <div class="hover-3d">
                        <textarea 
                            name="message"
                            class="textarea w-full h-20 validator  " 
                            placeholder="Type your message here" 
                            required></textarea>
                        </div>
                    </fieldset>

                    <!--Submit Button-->
                    <button class="btn btn-neutral text-neutral-content mt-4 mb-4">Submit</button>

                </form>
                

                <!--Successfull Submission Message-->
                @if(session()->has("message"))

                <div role="alert" class="alert alert-success text-success-content font-bold">
                    {{session()->get("message")}}
                </div>

                @endif
            </div>
        </div>



    </div>
</x-layout>


