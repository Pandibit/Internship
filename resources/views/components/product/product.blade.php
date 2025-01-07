<a href="/products/{{ $product->id }}">
    <div class="group relative">
        <div
            class="w-full h-56 bg-gray-200 rounded-md overflow-hidden  lg:h-72 xl:h-80">
            <img src="{{ asset($product->images->first() ? $product->images->first()->image_url : null) }}"
                 alt="Hand stitched, orange leather long wallet."
                 class="w-full transform transition-bezier duration-1500 ease-in-out group-hover:scale-125 h-full object-cover ">
        </div>

        <h3 class="mt-4 text-sm text-gray-700">

            <span class="absolute inset-0"></span>
            {{ $product->name }}

        </h3>
        <p class="mt-1 text-sm text-gray-500">{{ $product->price }}</p>
        <p class="mt-1 text-sm font-medium text-gray-900">{{ $product->category->name }}</p>
    </div>
</a>

