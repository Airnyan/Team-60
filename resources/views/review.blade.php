<x-layout>
    <x-slot:title>
        Review Page
    </x-slot:title>

    <div class="page" style="display: flex; justify-content: center; align-items: center; min-height: 70vh;">
        
        <div class="hover-3d" style="width: 800px;">
            <div class="bg-base-300 border border-base-300 shadow-sm px-10 py-10 rounded-2xl mb-2 text-neutral-content">
                <h1 class="text-2xl font-bold">Leave a review!</h1>
                
                <form action="/submit-review" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="1">
                    
                    <div class="form-group" style="margin: 20px 0;">
                        <label style="display: block; margin-bottom: 10px;">Your Rating:</label>
                        <div class="rating rating-lg">
                            <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-green-500" checked />
                            <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-green-500" />
                            <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-green-500" />
                            <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-green-500" />
                            <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-green-500" />
                            </div>
                        <textarea id="review_text" name="review" class="form-control" rows="5" placeholder="Write your thoughts here..." style="width: 100%; border-radius: 8px; padding: 10px; color: white;"></textarea>
                    </div>

                    <button type="submit" class="btn" style="width: 100%;">Submit Review</button> 
                </form>
            </div>
        </div>   
    </div>
</x-layout>