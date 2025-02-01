<x-app>
    <main>
        <section class=" rounded-md  m-20  mx-4 z-20">
            <div
                class="swiper rounded-md panelSwiper h-[18rem] sm:h-[20rem] md:h-[24rem] max-w-full lg:h-[30rem]   px-4 sm:py-24  lg:max-w-full">
                <div class="swiper-wrapper h-full rounded-md flex items-center">

                    <div class="swiper-slide  rounded-md w-full">
                        <div class="w-full h-full  bg-gray-200 rounded-md overflow-hidden">
                            <img src="{{ asset('images/3919927.jpg') }}"
                                 alt="Hand stitched, orange leather long wallet." class="h-full w-full">
                        </div>
                    </div>
                    <div class="swiper-slide  rounded-md w-full">
                        <div class="w-full h-full  bg-gray-200 rounded-md overflow-hidden">
                            <img src="{{ asset('images/10607573.jpg') }}"
                                 alt="Hand stitched, orange leather long wallet." class="h-full w-full">
                        </div>
                    </div>
                    <div class="swiper-slide  rounded-md w-full">
                        <div class="w-full h-full  bg-gray-200 rounded-md overflow-hidden">
                            <img src="{{ asset('images/10613770.jpg') }}"
                                 alt="Hand stitched, orange leather long wallet." class="h-full w-full">
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next first-next"></div>
                <div class="swiper-button-prev first-prev"></div>
            </div>
        </section>


        <section class="relative flex rounded-md flex-col   mt-20  mx-4 z-20">
            <div class="md:flex md:items-center md:justify-between px-3 pt-3">
                <h2 class="text-xl opacity-85 font-normal tracking-tight text-gray-700">Popular products</h2>
                <a href="{{ route('products') }}"
                   class="hidden text-sm font-medium opacity-65 text-gray-600 hover:text-indigo-500 md:block">VIEW
                    ALL<span aria-hidden="true"> &rarr;</span></a>
            </div>
            <div class="swiper productsSwiper max-w-full  py-16  sm:py-24">
                <div class=" swiper-wrapper flex items-center py-1 ">
                    @foreach($products as $product)
                        <div class="swiper-slide product-swiper-item px-2 ">
                            <x-product.product :product='$product'/>
                        </div>
                    @endforeach

                    <div class="swiper-button-next products-swiper"></div>
                    <div class="swiper-button-prev products-swiper"></div>


                </div>


            </div>
        </section>


        <section class="relative flex rounded-md flex-col    mx-16">
            <div class="md:flex md:items-center md:justify-between px-3 pt-3">
                <h2 class="text-xl opacity-85 font-normal tracking-tight text-gray-700">Categories</h2>
                <a href="{{ route('categories') }}"
                   class="hidden text-sm font-medium opacity-65 text-gray-600 hover:text-indigo-500 md:block">VIEW
                    ALL<span aria-hidden="true"> &rarr;</span></a>
            </div>
            <div class="swiper categorySwiper max-w-full  py-16  sm:py-24  ">
                <div class="swiper-wrapper flex items-center py-1 ">
                    @foreach($categories as $category)
                        <div class="swiper-slide  py-1 text-center">
                            <a href="{{ route('categories') }}">
                                <div class="group relative flex flex-col items-center justify-center">
                                    <div
                                        class="w-32 h-32 md:w-40 md:h-40 lg:w-48 lg:h-48 rounded-full bg-gray-200  overflow-hidden">
                                        <img
                                            src="{{ asset($category->image->category_image_url) }}"
                                            alt="Hand stitched, orange leather long wallet."
                                            class="w-full transform transition-bezier  duration-1500  ease-in-out group-hover:scale-125  object-cover">
                                    </div>
                                    <p>{{ $category->name }}</p>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next category-swiper"></div>
                <div class="swiper-button-prev category-swiper"></div>
            </div>
        </section>


        <section class="bg-white px-4 mt-10 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div
                class="mx-auto grid max-w-screen rounded-lg bg-gray-50 p-4 dark:bg-gray-800 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16">
                <div class="lg:col-span-5 lg:mt-0">
                    <a href="{{ route('categories') }}">
                        <img class="mb-4 h-56 w-56 dark:hidden sm:h-96 sm:w-96 md:h-full md:w-full"
                             src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg"
                             alt="peripherals"/>
                        <img class="mb-4 hidden dark:block md:h-full"
                             src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg"
                             alt="peripherals"/>
                    </a>
                </div>
                <div class="me-auto place-self-center lg:col-span-7">
                    <h1
                        class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-4xl">
                        Save your precious time by simply<br/>
                        shopping from the comfortness of your couch.
                    </h1>
                    <p class="mb-6 text-gray-500 dark:text-gray-400">Reserve your new Apple iMac 27” today and enjoy
                        exclusive savings with qualified activation. Pre-order now to secure your discount.</p>
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center bg-space-cadet justify-center rounded-lg bg-primary-700 px-5 py-3 text-center text-base font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        Start exploring now </a>
                </div>
            </div>
        </section>
    </main>
</x-app>
