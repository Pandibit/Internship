<x-app>
    <div class="bg-white">
        <div class="max-w-2xl  pt-20 sm:pt-24 mx-auto sm:px-6 lg:max-w-7xl ">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="{{ route('home') }}"
                                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                         viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                    <a href="{{ route('categories') }}"
                                       class="ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white md:ms-2">
                                        Categories
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                         viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                    <a href="{{ route('category', ['category' => $product->category]) }}"
                                       class="ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white md:ms-2">
                                        {{ $product->category->name }}
                                    </a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                         viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                    <span
                                        class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">{{ $product->name }}</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ $product->name }}</h2>
                </div>
            </div>
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                {{--      Color input         --}}
                <div class="flex flex-col-reverse">
                    <div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
                        <form id="addToCartForm" method="POST" action="{{ route('shopping-cart.store') }}">
                            @csrf
                            @method('POST')
                            <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal">
                                @foreach($product->images as $image)
                                    <label
                                        class="color-button relative h-20
                                        @if($loop->first == $image->color->id)  -span @endif bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                        role="tab"
                                        data-image="{{ asset($image->image_url) }}"
                                        type="button"
                                    >
                                        <input type="radio"
                                               name="colorId"
                                               value="{{ $image->color->id }}"
                                               class="color-input sr-only"
                                               aria-labelledby="{{ $image->color->id }}"
                                               @if($loop->first) checked @endif>
                                        >

                                        <span class="absolute inset-0 rounded-md overflow-hidden">
                                            <img src="{{ asset($image->image_url) }}" alt=""
                                                 class="w-full h-full object-center object-cover"
                                            >
                                        </span>
                                        <span
                                            class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none"
                                            aria-hidden="true"></span>
                                    </label>
                                @endforeach
                            </div>
                    </div>
                    <div class="w-full aspect-w-1 aspect-h-1">
                        <div id="main-image-panel"
                             aria-labelledby="tabs-1-tab-1"
                             role="tabpanel"
                             tabindex="0">
                            <img src="{{ asset($product->images->first()->image_url) }}"
                                 alt="Angled front view with bag zipped and handles upright."
                                 class="main-image w-full h-full object-center object-cover sm:rounded-lg">
                        </div>
                    </div>
                </div>
                {{--      Product id input          --}}
                <input type="hidden" name="productId" value="{{ $product->id }}">

                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    {{--        Product name            --}}
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->name }}</h1>
                    {{--        Product price           --}}
                    <div class="mt-3">
                        <h3 class="sr-only">Product price</h3>
                        <p class="text-3xl text-gray-900">{{ $product->price }}</p>
                    </div>
                    {{--        Product description          --}}
                    <div class="mt-6">
                        <h3 class="sr-only">Product description</h3>
                        <div class="text-base text-gray-700 space-y-6">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="pt-4">
                        {{--        Quantity input            --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <label for="counter-input"
                                       class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                                    Choose quantity by dev:
                                </label>
                                <div class="relative flex items-center">
                                    <button type="button"
                                            id="decrement-button"

                                            class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                    >
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <input type="number"
                                           id="quantity"
                                           name="quantity"
                                           class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                           placeholder=""
                                           min="1"
                                           value="1"
                                    />
                                    <button type="button"
                                            id="increment-button"

                                            class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"
                                    >
                                        <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>

                            </div>
                        </div>
                        {{--        Add to bag button                --}}
                        <div class="mt-5 flex sm:flex-col1">
                            <button type="submit"
                                    data-modal-target="popup-modal"
                                    data-modal-toggle="popup-modal"
                                    disabled
                                    id="addToCartButton"
                                    class="cursor-not-allowed max-w-xs flex-1 bg-indigo-600 opacity-50 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 sm:w-full">
                                Add to bag by dev
                            </button>
                        </div>

                        <section aria-labelledby="product-sizes" class="mt-12">
                            <div class="border-t divide-y divide-gray-200">
                                <div>
                                    {{--            Sizes collapsible button                        --}}
                                    <h3>

                                        <button type="button"
                                                id="sizes-button"
                                                class="group relative w-full py-6 flex justify-between items-center text-left"
                                                aria-controls="disclosure-1"
                                                aria-expanded="false"
                                        >

                                            <span class="text-gray-900 text-sm font-medium"> Sizes </span>
                                            <span class="ml-6 flex items-center">
                                                <x-icons.inactiveIcon/>
                                                <x-icons.activeIcon/>
                                            </span>
                                        </button>
                                    </h3>
                                    {{--            Size input                        --}}
                                    <div class="pb-3 prose prose-sm" id="disclosure-sizes">
                                        <fieldset class="space-y-5">
                                            @foreach($product->sizes as $size)
                                                <div class="relative flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input id="size-{{ $size->size->id }}"
                                                               aria-describedby="comments-description"
                                                               name="sizeId"
                                                               value="{{ $size->size->id }}"
                                                               type="radio"
                                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded"
                                                        >
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="size-{{ $size->size->id }}"
                                                               class="font-medium text-gray-700">
                                                            {{ $size->size->size_name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    </form>

                </div>
            </div>
        </div>

        <div id="popup-modal"
             tabindex="-1"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    {{--        Close Modal            --}}
                    <button type="button"
                            class="absolute top-2 right-2 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-modal">
                        <x-icons.close/>
                        <span class="sr-only">Close modal</span>
                    </button>
                    {{-- Links to direct --}}
                    <div class=" md:p-5 text-center">
                        <h3 class="my-2 text-md font-bold text-gray-900 dark:text-gray-400">Order submitted!</h3>
                        <h3 class="mb-5 mt-2 text-xs font-normal text-gray-700 dark:text-gray-400">Your product has
                            been
                            added to the cart</h3>

                        <a href=" {{ route('shopping-cart') }} " data-modal-hide="popup-modal" type="button"
                           class="py-2.5 px-5 ms-3 text-sm font-medium hover:text-gray-700 focus:outline-none hover:bg-white rounded-lg border border-gray-200 bg-gray-100 text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Go to shopping cart
                        </a>
                        <a href=" {{ route('home') }} " data-modal-hide="popup-modal" type="button"
                           class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Continue
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative flex rounded-md flex-col sm:px-6 mx-auto  lg:max-w-7xl   z-20">
            <div class="md:flex md:items-center md:justify-between px-3 py-3">
                <h2 class="text-xl opacity-85 font-normal tracking-tight text-gray-700">Popular products</h2>
                <a href="{{ route('products') }}"
                   class="hidden text-sm font-medium opacity-65 text-gray-600 hover:text-indigo-500 md:block">VIEW
                    ALL<span aria-hidden="true"> &rarr;</span></a>
            </div>
            <div class="swiper productsSwiper max-w-full  py-16  sm:py-24">
                <div class="swiper-wrapper flex items-center py-1 ">
                    @foreach($products as $product)
                        <div class="swiper-slide px-2 ">
                            <x-product.product :product='$product'/>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next products-swiper"></div>
                <div class="swiper-button-prev products-swiper"></div>
            </div>
        </section>
    </div>
</x-app>
<script>
    $(document).ready(function () {
        function changeImageInput() {
            $('.color-button').on('click', function () {
                let imageUrl = $(this).data('image');
                $('.main-image').attr('src', imageUrl);
            });

            $('.color-input').on('change', function () {
                $('.color-button').removeClass('active-span');
                $(this).closest('.color-button').addClass('active-span');
            });
        }

        function toggleSizesCollapsible() {
            $('#sizes-button').on('click', function () {
                $('.active').add('.inactive').add('#disclosure-sizes').toggleClass('hidden');
            });
        }

        function checkSelections() {
            const colorSelected = $('input[name="colorId"]:checked').val();
            const sizeSelected = $('input[name="sizeId"]:checked').val();
            if (colorSelected && sizeSelected) {
                $('#addToCartButton').removeClass('cursor-not-allowed opacity-50 transition duration-300').prop('disabled', false);

            } else {
                $('#addToCartButton').addClass('cursor-not-allowed opacity-50').prop('disabled', true);

            }
            $('input[name="colorId"], input[name="sizeId"], input[name="quantity"]').on('change', function () {
                checkSelections();
            });
        }

        function changeQuantityInput(quantityInput) {
            const $quantityInput = quantityInput;
            const min = parseInt($quantityInput.attr('min')) || 1;
            $('#decrement-button').click(function () {
                const currentValue = parseInt($quantityInput.val()) || 0;
                if (currentValue > min) {
                    $quantityInput.val(currentValue - 1);
                }
            });
            $('#increment-button').click(function () {
                $quantityInput.val((parseInt($quantityInput.val()) || 0) + 1);
            });
            $quantityInput.on('input', function () {
                const currentValue = parseInt($(this).val());
                if (currentValue < min) {
                    $(this).val(min);
                }
            });
        }

        changeImageInput();
        toggleSizesCollapsible();
        checkSelections();
        changeQuantityInput($('#quantity'));
        $('#addToCartForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('shopping-cart.store') }}",
                method: 'POST',
                dataType: 'json',
                data: $(this).serialize() + '&_token={{ csrf_token() }}',
                success: function (response) {
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        let errors = JSON.parse(xhr.responseText);
                        $('.quantity-error').text(errors.errors.quantity);
                    }
                }
            });
        });
    })
</script>

