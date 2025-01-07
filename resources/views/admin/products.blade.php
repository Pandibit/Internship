<x-admin-home>
    <div class="p-5 max-w-screen-lg border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div>
            <div class="flex items-center justify-between">
                <p class="text-3xl pb-3 text-gray-900 dark:text-white">Products</p>
                <button type="button"
                        class="add-product text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Add a product
                </button>
            </div>
            <table id="products-table" class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Id
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Name
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Price
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Category Name
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Action
                        </span>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Product Id</td>
                    <td>Product Name</td>
                    <td>Product Price</td>
                    <td>Product Category Name</td>
                    <td>Action</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>


    <div id="add-product-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add a product
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
                    <x-forms.input type="text" placeholderName="Name" id="product-name" name="product-name"/>
                    <x-forms.input type="text" placeholderName="Short description" id="product-description"
                                   name="product-description"/>
                    <x-forms.input type="number" placeholderName="Price" id="product-price" name="product-price"/>
                    <select id="product-category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>


                </div>
                <!-- Modal footer -->
                <div
                    class="close-modal flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button"
                            id="confirm-add-product"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm py-2.5 px-5 ms-3 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Add product
                    </button>
                    <button type="button"
                            class="close-modal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="delete-product-modal" tabindex="-1"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                        class="close-modal absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 ">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete this product?</h3>

                    <div class="flex items-center">
                        <button id="confirm-delete-product" type="button"
                                class="w-full text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button type="button"
                                class="close-modal w-full  py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            No, cancel
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="edit-product-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit the product
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
                    <x-forms.input type="text" placeholderName="Name" id="edit-product-name" name="edit-product-name"/>
                    <x-forms.input type="number" placeholderName="Price" id="edit-product-price"
                                   name="edit-product-price"/>
                    <select id="edit-product-category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>


                </div>
                <!-- Modal footer -->
                <div
                    class="close-modal flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button"
                            id="confirm-edit-product"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm py-2.5 px-5 ms-3 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Add product
                    </button>
                    <button type="button"
                            class="close-modal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>


</x-admin-home>
<script>

    let productsTable = $('#products-table').DataTable({
        ajax: {
            url: "{{ route('admin.products-data') }}",
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
        columns: [
            {data: 'productId'},
            {data: 'productName'},
            {data: 'productPrice'},
            {data: 'categoryName'},
            {
                data: 'productData',
                render: function (data, type, row) {
                    return '<div class="flex"> <button type="button" data-id="' + data + '" class="delete-product-button w-1/2 text-gray-900 bg-white border border-gray-300 ' +
                        'focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 ' +
                        'font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ' +
                        'dark:bg-gray-800 dark:text-white dark:border-gray-600 ' +
                        'dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Delete</button>' +

                        '<button  type="button" id="edit-' + data + '"  class="edit-product-button w-1/2 text-white bg-gray-800 ' +
                        'hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 ' +
                        'font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 ' +
                        'dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Edit</button> </div>'
                        ;
                }
            }
        ],
        createdRow: function (row, data, dataIndex) {

        },
    });

    $('.add-product').on('click', function () {
        let modal = new Modal($('#add-product-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        })
        $('#confirm-add-product').off('click').on('click', function () {
            $.ajax({
                url: "{{ route('admin.add-product') }}",
                type: 'POST',
                data: {
                    name: $('#product-name').val(),
                    description: $('#product-description').val(),
                    price: $('#product-price').val(),
                    category_id: $('#product-category').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    modal.hide();
                    productsTable.ajax.reload();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });


    });

    productsTable.on('click', '.delete-product-button', function () {
        const rowData = productsTable.row($(this).closest('tr')).data();
        console.log(rowData.productId);
        let modal = new Modal($('#delete-product-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        });

        $('#confirm-delete-product').off('click').on('click', function () {
            const url = "{{ route('admin.destroy-product', ':product') }}";
            $.ajax({
                url: url.replace(':product', rowData.productId),
                type: 'DELETE',
                data: {
                    id: rowData.productId,
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    productsTable.ajax.reload();
                    modal.hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });
    productsTable.on('click', '.edit-product-button', function () {
        let rowData = productsTable.row($(this).closest('tr')).data();
        let modal = new Modal($('#edit-product-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        });
        $('#edit-product-name').val(rowData.productName);
        $('#edit-product-price').val(parseFloat(rowData.productPrice.replace(/[^\d.-]/g, '')));
        $('#edit-product-category').val(rowData.categoryId);

        $('#confirm-edit-product').off('click').on('click', function () {
            const url = "{{ route('admin.update-product', ':product') }}";
            $.ajax({
                url: url.replace(':product', rowData.productId),
                type: 'PUT',
                data: {
                    name: $('#edit-product-name').val(),
                    price: $('#edit-product-price').val(),
                    category_id: $('#edit-product-category').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    productsTable.ajax.reload();
                    modal.hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });

    });


</script>

