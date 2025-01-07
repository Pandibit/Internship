<script></script>
<x-app>
    <div class="h-full ">

        <div class="flex flex-col  mt-40 text-center mx-2">
            <p class="text-5xl font-medium">Categories</p>
            <p class="text-base pt-8 opacity-90">Explore the best of Media - Explore the best categories or check out
                posts by categories</p>
            <p class="text-sm opacity-60 pt-2">Tip: You can search by the products in the search bar above</p>
            <div class="pt-4 flex flex-col justify-start w-full lg:flex-row lg:items-center lg:justify-center  ">
                <a href=""
                   class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">View
                    recommended posts</a>
                <a href="{{ route('categories') }}"
                   class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">View
                    all categories</a>
            </div>
        </div>

        <div class="px-4 my-20">

            <ul role="list"
                class="grid grid-cols-2 max-w-screen-2xl mx-auto  gap-x-4 gap-y-4 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($categories as $category)
                    @if ($loop->first)
                        <li class=" row-span-2 col-span-2 text-center flex flex-col ">
                            <a href="categories/{{ $category->name }}">

                                <p class="pb-4 block text-sm font-medium text-gray-900 truncate pointer-events-none">
                                    {{ $category->name }}
                                </p>

                                <div
                                    class="group h-full w-full  aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">

                                    <img src="{{ asset($category->image->category_image_url) }}" alt=""
                                         class=" object-cover pointer-events-none group-hover:opacity-75 ">

                                </div>


                            </a>

                        </li>
                    @else

                            <li class=" text-center flex flex-col ">
                                <a href="categories/{{ $category->name }}">

                                <p class="pb-4 block text-sm font-medium text-gray-900 truncate pointer-events-none">
                                    {{ $category->name }}
                                </p>
                                <div
                                    class="group block w-full  aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                    <img src="{{ asset($category->image->category_image_url) }}" alt=""
                                         class="object-cover pointer-events-none group-hover:opacity-75">

                                </div>

                                </a>
                            </li>

                    @endif
                @endforeach
            </ul>


        </div>
    </div>

</x-app>
