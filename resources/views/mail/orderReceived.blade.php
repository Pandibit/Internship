<div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:pb-24 lg:px-8">
        <div class="max-w-xl">
            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Order history</h1>
        </div>

        <div class="mt-16">
            <h2 class="sr-only">Recent orders</h2>

            <div class="space-y-20">
                <div>

                    <table class="mt-4 w-full text-gray-500 sm:mt-6">
                        <caption class="sr-only">
                            Products
                        </caption>
                        <thead class="sr-only text-sm text-gray-500 text-left sm:not-sr-only">
                        <tr>
                            <th scope="col" class="sm:w-2/5 lg:w-1/3 pr-8 py-3 font-normal">Id</th>
                            <th scope="col" class="hidden w-1/5 pr-8 py-3 font-normal sm:table-cell">Product Id</th>
                            <th scope="col" class="hidden pr-8 py-3 font-normal sm:table-cell">Color Id</th>
                            <th scope="col" class="w-0 py-3 font-normal text-right">Size ID</th>
                            <th scope="col" class="w-0 py-3 font-normal text-right">Quantity</th>
                        </tr>
                        </thead>
                        <tbody class="border-b border-gray-200 divide-y divide-gray-200 text-sm sm:border-t">
                        @foreach($order->items as $item)
                            <tr>
                                <td class="py-6 pr-8">
                                    <div class="flex items-center">

                                        <div>
                                            <div class="font-medium text-gray-900">{{ $item['id']}}</div>

                                        </div>
                                    </div>
                                </td>
                                <td class="hidden py-6 pr-8 sm:table-cell">{{ \App\Models\Product::find($item['product_id'])->name }}</td>
                                <td class="hidden py-6 pr-8 sm:table-cell">{{ \App\Models\Color::find($item['color_id'])->name }}</td>
                                <td class="hidden py-6 pr-8 sm:table-cell">{{ \App\Models\Size::find( $item['size_id'])->size_name }}</td>
                                <td class="hidden py-6 pr-8 sm:table-cell">{{ $item['quantity'] }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- More orders... -->
            </div>
        </div>
    </div>
</div>



