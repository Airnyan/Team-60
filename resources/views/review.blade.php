<x-layout>
    <x-slot:title>
        Review Page
    </x-slot:title>

    <div class="page" style="display: flex; flex-direction: column; align-items: center; min-height: 70vh; padding-top: 50px;">
        
        <div class="hover-3d" style="width: 800px; margin-bottom: 40px;">
            <div class="bg-base-300 border border-base-300 shadow-sm px-10 py-10 rounded-2xl text-neutral-content">
                <h1 class="text-2xl font-bold">Leave a review!</h1>
                
                <form action="/submit-review" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="1">
                    
                    <div class="form-group" style="margin: 20px 0;">
                        <label style="display: block; margin-bottom: 10px;">Your Rating:</label>
                        <div class="rating rating-lg">
                            <input type="radio" name="rating" value="1" class="mask mask-star-2 bg-green-500" />
                            <input type="radio" name="rating" value="2" class="mask mask-star-2 bg-green-500" />
                            <input type="radio" name="rating" value="3" class="mask mask-star-2 bg-green-500" />
                            <input type="radio" name="rating" value="4" class="mask mask-star-2 bg-green-500" checked />
                            <input type="radio" name="rating" value="5" class="mask mask-star-2 bg-green-500" />
                        </div>
                        <textarea id="review_text" name="review" class="form-control" rows="5" placeholder="Write your thoughts here..." style="width: 100%; border-radius: 8px; padding: 10px; color: white; background: rgba(0,0,0,0.2);"></textarea>
                    </div>

                    @auth
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Submit Review
                    </button>
                    @endauth
                    
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-outline" style="width: 100%; text-align: center;">
                        Log in to review
                    </a>
                    @endguest
                </form>
            </div>
        </div>   

        <div class="reviews-list" style="width: 800px;">
            <h2 class="text-xl font-bold mb-4 text-white">Customer Reviews</h2>
            
            @foreach($reviews as $review)
                <div class="bg-base-300 border border-base-300 p-6 rounded-xl mb-4 text-neutral-content">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-green-500 text-lg">{{ $review->user->name }}</span>
                        
                        <div class="rating rating-sm">
                            @for($i = 1; $i <= 5; $i++)
                                <input type="radio" class="mask mask-star-2 bg-green-500" disabled {{ $review->rating == $i ? 'checked' : '' }} />
                            @endfor
                        </div>
                    </div>
                    
                    <p class="mb-2">{{ $review->review }}</p>
                    <span class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>