<x-app>
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-0">
            <h1 class="text-3xl font-extrabold text-center tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>

            <section aria-labelledby="cart-heading">
                <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                <ul role="list" class="border-t mt-3 border-b border-gray-200 divide-y divide-gray-200">


                    @foreach ($shoppingCart as $item)
                        @php

                            $product = \App\Models\Product::find($item['productId']);
                            $productImage = $product
                                ->images()
                                ->where('color_id', $item['colorId'])
                                ->first();
                            $productSize = $product
                                ->sizes()
                                ->where('size_id', $item['sizeId'])
                                ->first()->size->size_name;
                            $productPrice = $product->price;
                            preg_match('/[\d.]+/', $productPrice, $matches);
                            $productPriceNumericValue = $matches[0];
                            $productTotalPrice = $productPriceNumericValue * number_format($item['quantity']);

                        @endphp
                        <li class="cart-item flex py-6" data-price="{{ $productPriceNumericValue }}"
                            data-id="{{ $item['id'] }}">
                            <input class="hidden quantity" value="{{ $item['quantity'] }}">
                            <div class="flex-shrink-0">
                                <a href="{{ route('product', $product) }}">
                                    <img src="{{ $productImage->image_url }}"
                                         alt="Front of mint cotton t-shirt with wavey lines pattern."
                                         class="w-24 h-24 rounded-md object-center object-cover sm:w-32 sm:h-32">
                                </a>
                            </div>

                            <div class="ml-4 flex-1 flex flex-col sm:ml-6">
                                <div>
                                    <div class="flex justify-between">
                                        <h4 class="text-sm">
                                            <a href="{{ route('product', $product) }}"
                                               class="quantity font-medium text-gray-700 hover:text-gray-800">
                                                {{ $product->name }} ( x{{ $item['quantity'] }})
                                            </a>
                                        </h4>
                                        <p class="pricePerUnit ml-4 text-sm font-medium text-gray-900">
                                            ${{ $productTotalPrice  }}
                                        </p>
                                    </div>

                                </div>

                                <div class="mt-4 flex-1 flex items-end justify-between">
                                    <p class="flex items-center text-sm text-gray-700 space-x-2">

                                        <span>{{ $productSize }}</span>
                                    </p>
                                    <div class="ml-4">
                                        <button type="button" data-key="{{ $item['id'] }}"
                                                class="remove-item text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <p class="flex relative text-xs text-red-500 error-item"></p>
                                </div>

                            </div>


                        </li>
                    @endforeach


                </ul>
            </section>

            <!-- Order summary -->
            @if (isset($shoppingCart) && count($shoppingCart) > 0)
                <section aria-labelledby="summary-heading" class="mt-10">
                    <h2 id="summary-heading" class="sr-only">Order summary</h2>

                    <div>
                        <dl class="space-y-4">
                            <div class="flex items-center justify-between">
                                <dt class="text-base font-medium text-gray-900">Total</dt>
                                <dd class="shoppingCartTotal ml-4 text-base font-medium text-gray-900">

                                </dd>
                            </div>
                        </dl>
                        <p class="mt-1 text-sm text-gray-500">Shipping and taxes will be calculated at checkout.</p>
                    </div>

                    <div class="mt-10">
                        <button type="submit" id="checkoutButton"
                                class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
                            Checkout
                        </button>
                    </div>

                    <div class="mt-6 text-sm text-center text-gray-500">
                        <p>
                            or <a href="{{ route('home') }}"
                                  class="text-indigo-600 font-medium hover:text-indigo-500">Continue
                                Shopping<span aria-hidden="true"> &rarr;</span></a>
                        </p>
                    </div>
                </section>
            @else
                <section>
                    <div class="mt-6 space-y-2 text-sm text-center text-gray-500">
                        <p>Seems you have not purchased anything yet!</p>

                        <a href="{{ route('home') }}"
                           class="text-indigo-600 font-medium hover:text-indigo-500">Continue
                            Shopping<span aria-hidden="true"> &rarr;</span></a>

                    </div>
                </section>
            @endif

        </div>
    </div>

    <div id="toast-danger"
         class="hidden fixed lg:top-20 lg:right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
         role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-indigo-500 bg-indigo-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">
            <span>You nedd to <a class="text-indigo-500 underline hover:cursor-pointer"
                                 href="{{ route('login') }}">login</a> first</span>
        </div>
        <button type="button"
                class="close-toast ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    <div id="toast-success"
         class="hidden fixed lg:top-20 lg:right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
         role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-indigo-500 bg-indigo-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">
            <span>Your purchase has been delivered!</span>
        </div>
        <button type="button"
                class="checkout-button ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
</x-app>

<script>
    $(document).ready(function () {
        function updateShoppinCartTotal() {
            let shoppingCartTotal = 0;
            $('.cart-item').each(function () {
                let price = $(this).data('price');
                let quantity = $(this).find('.quantity').attr('value');
                let itemTotal = price * Number(quantity);
                shoppingCartTotal += itemTotal;
                $('.shoppingCartTotal').text("$" + shoppingCartTotal);
            });
            $('.shoppingCartTotal').text("$" + shoppingCartTotal);
        }

        function removeItem(item) {
            item.on('click', function () {
                const id = $(this).data('key');
                $.ajax({
                    url: "{{ route('shopping-cart.removeItem') }}",
                    type: 'DELETE',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        $('.cart-item[data-id="' + id + '"]').remove();
                        updateShoppinCartTotal();
                        location.reload();
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            });
        }

        function toggleToast(toastType) {
            toastType.toggleClass('hidden');
        }

        function checkoutShoppingStore(checkoutButton) {
            checkoutButton.on('click', function () {
                event.preventDefault();
                updateShoppinCartTotal();
                $.ajax({
                    url: "{{ route('shopping-cart.checkout') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function () {
                        toggleToast($('#toast-success'));
                        setTimeout(function () {
                            location.reload();
                        }, 1000)
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let dataIds = JSON.parse(xhr.responseText)['errors'];
                            let dataIdsObj = {};
                            dataIds.forEach(id => {
                                dataIdsObj[id] =
                                    'The quantity you have requested exceed the quantity in the store ';
                            })
                            for (const [id, message] of Object.entries(dataIdsObj)) {
                                $(`li[data-id="${id}"] .error-item`).text(message)
                            }
                        } else if (xhr.status === 401) {
                            toggleToast($('#toast-danger'));
                        }
                    }
                });

            });
        }

        removeItem($('.remove-item'));
        updateShoppinCartTotal();
        checkoutShoppingStore($('#checkoutButton'));
        $('.close-toast').on('click', toggleToast);
    })
</script>
