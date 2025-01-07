<x-admin-home>
    <div class="p-5 max-w-screen-lg border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <table id="orders-table" class="table table-bordered w-full">
            <thead>
            <tr>
                <th>
                    <span class="flex items-center">
                        Click it
                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Order ID

                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Total Quantity

                    </span>
                </th>
                <th>
                    <span class="flex items-center">
                        Total Price
                    </span>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Click</td>
                <td>Order id</td>
                <td>Total quantity</td>
                <td>Total price</td>

            </tr>

            </tbody>
            <tfoot>
            <tr>
                <th class="text-center" colspan="2">Total</th>
                <th id="totalQuantity"></th>
                <th id="totalPrice"></th>
            </tr>
            </tfoot>
        </table>
    </div>
</x-admin-home>

<script>


    let salesTable = $('#orders-table').DataTable({
        ajax: {
            url: "{{ route('admin.sales-data') }}",
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        },
        columns: [
            {
                data: 'click',
                render: function (data, type, row) {
                    return '<div class="add-items hover:cursor-pointer text-center">+</div>';
                }
            },
            {data: 'orderId'},
            {data: 'totalQuantity'},
            {data: 'totalPrice'},
        ],
        processing: true,
        serverSide: true,
        createdRow: function (row, data, dataIndex) {
            $(row).find('td:eq(3),  td:eq(2)').css('color', 'white')
            if (data.totalQuantity > 10) {
                $(row).find('td:eq(3), td:eq(2)').css('background-color', 'green')
            } else {
                $(row).find('td:eq(3), td:eq(2)').css('background-color', 'red')
            }
        },
        drawCallback: function () {
            var api = this.api();
            $totalQuantity = api.column(2, {page: 'current'}).data().sum();
            $totalPrice = api.column(3, {page: 'current'}).data().sum();

            $totalPriceCell = $(api.table().footer().querySelectorAll('th')[2]);
            $totalQuantityCell = $(api.table().footer().querySelectorAll('th')[1]);

            $totalQuantityCell.html($totalQuantity);
            $totalPriceCell.html($totalPrice);

            $totalPriceCell.css('color', 'white');
            $totalQuantityCell.css('color', 'white');

            $totalQuantity >= 30 ? $totalQuantityCell.css('background-color', 'green') : $totalQuantityCell.css('background-color', 'red');
            $totalPrice >= 15000 ? $totalPriceCell.css('background-color', 'green') : $totalPriceCell.css('background-color', 'red');
        }
    });


    function format(d) {
        // `d` is the original data object for the row
        let orderItemsTable = `
              <table id="items-table" class="display table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Item ID</th>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center" colspan="5">Total</th>
                        <th id="totalQuantity"></th>
                        <th id="totalPrice"></th>
                    </tr>
                </tfoot>
                </table>
    `;

        $orderItemsTable = $(orderItemsTable); //Append the table in the DOM
        $orderItemsTable.DataTable({ // Convert it in a datatable
            data: Object.values(d.orderItems),
            columns: [
                {data: 'item_id'},
                {data: 'product_name'},
                {data: 'color_name'},
                {data: 'size_name'},
                {data: 'category_name'},
                {data: 'quantity'},
                {data: 'price'}
            ],
            drawCallback: function () {
                var api = this.api();
                var sum = 0;
                api.rows().every(function (rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    var product = data['quantity'] * parseFloat(data['price']);
                    sum += product;
                })

                $totalQuantityCell = $(api.table().footer().querySelectorAll('th')[1]);
                $totalPriceCell = $(api.table().footer().querySelectorAll('th')[2]);

                $totalPriceCell.css('color', 'white');
                $totalQuantityCell.css('color', 'white');

                $totalQuantity = api.column(5, {page: 'current'}).data().sum();
                $(api.table().footer().querySelectorAll('th')[2]).html(sum);
                $(api.table().footer().querySelectorAll('th')[1]).html($totalQuantity);


                $totalQuantity >= 10 ? $totalQuantityCell.css('background-color', 'green') : $totalQuantityCell.css('background-color', 'red');
                sum >= 3000 ? $totalPriceCell.css('background-color', 'green') : $totalPriceCell.css('background-color', 'red');

            },

            order: [[1, 'asc']]
        });


        return $orderItemsTable; // and u return the datatable
    }

    salesTable.on('click', '.add-items', function (e) {
        let tr = e.target.closest('tr');
        let row = salesTable.row(tr);
        if (row.child.isShown()) {
            row.child.hide();
            e.target.textContent = "+";
        } else {
            row.child(format(row.data())).show();
            e.target.textContent = "-";
        }
    });


</script>
