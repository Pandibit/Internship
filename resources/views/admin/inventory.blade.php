<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.3/dist/flowbite.min.js"></script>--}}

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="font-body">

<div class="flex h-screen">
    <aside id="separator-sidebar"
           class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
           aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('admin.inventory') }}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <x-icons.inventory/>
                        <span class="ms-3">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <x-icons.users/>
                        <span class="ms-3">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("admin.products") }}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <x-icons.product/>
                        <span class="ms-3">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("admin.sales") }}"
                       class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <x-icons.sales/>
                        <span class="ms-3">Sales</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <li>
                    <form method="POST" action="/logout" class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button class="flex w-full items-center p-2 text-gray-900 transition duration-75 rounded-lg
                            hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                            <x-icons.sign-out/>
                            <span class="ms-3">Sign Out</span>
                        </button>
                    </form>
                </li>
                <li>
                    <a href="{{ route('home') }}"
                       class="flex items-center p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                        <x-icons.home/>
                        <span class="ms-3">Home</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>


    <div class="flex-grow px-4 sm:ml-64 flex flex-col overflow-x-auto">
        <div class="flex items-center justify-between sm:justify-end">
            <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar"
                    aria-controls="separator-sidebar" type="button"
                    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                          d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
            <div class="flex items-center justify-end mt-3">
                <x-header.navbar/>
                <x-header.controller/>
            </div>
        </div>
        <form id="filterInventoryTable" class="max-w-full justify-center my-3 flex gap-2 items-center">
            <select id="product"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">All products</option>
                @foreach($products as $product)
                    <option value={{ $product->id }}>{{ $product->name }}</option>
                @endforeach
            </select>
            <select id="color"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">All colors</option>
                @foreach($colors as $color)
                    <option value={{ $color->id }}>{{ $color->name }}</option>
                @endforeach
            </select>
            <select id="size"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">All sizes</option>
                @foreach($sizes as $size)
                    <option value={{ $size->id }}>{{ $size->size_name }}</option>
                @endforeach
            </select>
            <select id="price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">All prices</option>
                @foreach($prices as $price)
                    <option value="{{ $price }}">{{ $price }}</option>
                @endforeach
            </select>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Submit
            </button>


        </form>
        <div class="p-5 w-full border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <p class="text-3xl pb-3 text-gray-900 dark:text-white">Inventory</p>
            <table id="inventory-table" class="table table-bordered w-full">
                <thead>
                <tr>
                    <th>
                    <span class="flex items-center">
                        Prouduct Name

                    </span>
                    </th>
                    <th>
                    <span class="flex items-center">
                        Size

                    </span>
                    </th>
                    <th>
                    <span class="flex items-center">
                        Color

                    </span>
                    </th>
                    <th>
                    <span class="flex items-center">

                        Quantity
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                             height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Price

                        </span>
                    </th>
                    <th>
                        <span class="flex items-center text-center">
                            Modify row

                        </span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Product name</td>
                    <td>Size name</td>
                    <td>Color name</td>
                    <td>Product quantity</td>
                    <td>Product Price</td>
                    <td class="text-center">Modify row</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<div id="edit-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit inventory item
                </h3>
                <button type="button"
                        class="close-modal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <x-forms.input type="text" placeholderName="Product Name" id="inventory-product-name"
                               name="product-name"/>
                <select id="inventory-product-size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">All sizes</option>
                    @foreach($sizes as $size)
                        <option value={{ $size->id }}>{{ $size->size_name }}</option>
                    @endforeach
                </select>
                <select id="inventory-product-color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">All sizes</option>
                    @foreach($colors as $color)
                        <option value={{ $color->id }}>{{ $color->name }}</option>
                    @endforeach
                </select>
                <x-forms.input type="number" placeholderName="Quantity" id="inventory-product-quantity"
                               name="quantity"/>
                <x-forms.input type="text" placeholderName="Price" id="inventory-product-price" name="price"/>
            </div>
            <!-- Modal footer -->
            <div

                class="close-modal flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="button"
                        id="confirm-update-modal"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update
                </button>
                <button type="button"
                        class="close-modal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<script>


    $('#filterInventoryTable').on('submit', function (e) {
        e.preventDefault();
        inventoryTable.ajax.reload();
    });

    let inventoryTable = $('#inventory-table').DataTable({
        ajax: {
            url: "{{ route('admin.inventory-data') }}",
            method: 'POST',
            data: function (d) {
                filters = {
                    string:
                        {
                            product_id: $('#product').val(),
                            color_id: $('#color').val(),
                            size_id: $('#size').val(),
                        },
                    custom: {
                        price: $('#price').val(),
                    }

                };
                d.filters = filters ? filters : {};
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
        columns: [
            {data: 'product_name'},
            {data: 'size'},
            {data: 'color'},
            {data: 'quantity'},
            {data: 'price'},
            {
                data: 'inventory',
                render: function (data, type, row) {
                    return '<div class="flex"> <button type="button" data-id="' + data + '" class="delete-button w-1/2 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 ' +
                        'dark:focus:ring-red-800 shadow-lg shadow-red-500/50 ' +
                        'dark:shadow-lg dark:shadow-red-800/80 font-medium ' +
                        'rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2">Delete</button>' +
                        '<button  type="button" id="edit-' + data + '" data-modal-target="edit-modal" data-modal-toggle="edit-modal" class="edit-button w-1/2 text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 ' +
                        'dark:focus:ring-red-800 shadow-lg shadow-red-500/50 ' +
                        'dark:shadow-lg dark:shadow-red-800/80 font-medium ' +
                        'rounded-lg text-sm px-2 py-2.5 text-center me-2 mb-2">Edit</button> </div>'
                        ;
                }
            }
        ],
        processing: true,
        serverSide: true,
    });

    $('#inventory-table').on('click', '.delete-button', function () {

        const url = "{{ route('admin.inventory-delete-item', ':inventory') }}";
        $.ajax({
            url: url.replace(':inventory', $(this).data('id')),
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function () {
                inventoryTable.ajax.reload();
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    });

    $('#inventory-table').on('click', '.edit-button', function () {
        const rowData = inventoryTable.row($(this).closest('tr')).data();
        let modal = new Modal($('#edit-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        });
        $('#inventory-product-name').val(rowData.product_name);
        $('#inventory-product-color').val(rowData.color_id);
        $('#inventory-product-size').val(rowData.size_id);
        $('#inventory-product-quantity').val(rowData.quantity);
        $('#inventory-product-price').val(rowData.price);
        $('#confirm-update-modal').off('click').on('click', function () {
            const url = "{{ route('admin.inventory-update-item', ':inventory') }}";
            $.ajax({
                url: url.replace(':inventory', rowData.id),
                type: 'PUT',
                data: {
                    id: rowData.id,
                    product_name: $('#inventory-product-name').val(),
                    color: Number($('#inventory-product-color').val()),
                    size: Number($('#inventory-product-size').val()),
                    quantity: Number($('#inventory-product-quantity').val()),
                    price: $('#inventory-product-price').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    inventoryTable.ajax.reload();
                    modal.hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });


    });


</script>







