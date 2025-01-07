<x-admin-home>
    <div class="p-5 max-w-screen-lg  border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div>
            <div class="flex justify-between items-center pb-3">
                <p class="text-3xl  text-gray-900 dark:text-white">Users</p>
                <button type="button"
                        class="add-user text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Add a user
                </button>
            </div>
            <table id="users-table" class="table table-bordered w-full">
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
                        Email
                    </span>
                    </th>
                    <th>
                    <span class="flex items-center">
                        Role
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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>

                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div id="add-user-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add a user
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
                    <x-forms.input type="text" placeholderName="Name" id="user-name" name="user-name"/>
                    <x-forms.email-input type="email" placeholderName="Email" id="user-email" name="user-email"/>
                    <x-forms.input type="text" placeholderName="Password" id="user-password" name="user-password"/>
                    <select id="user-role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($roles as $role)
                            <option value={{ $role->name }}>{{ $role->name }}</option>
                        @endforeach
                    </select>


                </div>
                <!-- Modal footer -->
                <div
                    class="close-modal flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button"
                            id="confirm-add-user"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm py-2.5 px-5 ms-3 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Add user
                    </button>
                    <button type="button"
                            class="close-modal py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-user-modal" tabindex="-1"
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
                        delete this user?</h3>

                    <div class="flex items-center">
                        <button id="confirm-delete-user" type="button"
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

    <div id="edit-user-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit the user
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
                    <x-forms.input type="text" placeholderName="Name" id="user-name-edit" name="user-name"/>
                    <x-forms.email-input type="email" placeholderName="Email" id="user-email-edit" name="user-email"/>
                    <select id="user-role-edit"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($roles as $role)
                            <option value={{ $role->name }}>{{ $role->name }}</option>
                        @endforeach
                    </select>


                </div>
                <!-- Modal footer -->
                <div
                    class="close-modal flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button"
                            id="confirm-update-user"
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm py-2.5 px-5 ms-3 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Update
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

    let usersTable = $('#users-table').DataTable({
        ajax: {
            url: "{{ route('admin.users-data') }}",
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },

        },
        columns: [
            {data: 'userId'},
            {data: 'userName'},
            {data: 'userEmail'},
            {data: 'userRole'},
            {
                data: 'userData',
                render: function (data, type, row) {
                    if (row.userRole !== 'admin') {
                        return '<div class="flex"> <button type="button" data-id="' + data + '" class="delete-user-button w-1/2 text-gray-900 bg-white border border-gray-300 ' +
                            'focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 ' +
                            'font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ' +
                            'dark:bg-gray-800 dark:text-white dark:border-gray-600 ' +
                            'dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Delete</button>' +

                            '<button  type="button" id="edit-' + data + '"  class="edit-user-button w-1/2 text-white bg-gray-800 ' +
                            'hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 ' +
                            'font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 ' +
                            'dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Edit</button> </div>'
                            ;
                    }
                    return '<h1 class="text-center">You can not delete yourself<h1>';

                }
            }
        ],

    });

    $('.add-user').on('click', function () {
        let modal = new Modal($('#add-user-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        });
        $('#confirm-add-user').off('click').on('click', function () {
            $.ajax({
                url: "{{ route('admin.add-user') }}",
                type: 'POST',
                data: {
                    name: $('#user-name').val(),
                    email: $('#user-email').val(),
                    password: $('#user-password').val(),
                    userRole: $('#user-role').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    modal.hide();
                    usersTable.ajax.reload();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });

    usersTable.on('click', '.delete-user-button', function () {
        const rowData = usersTable.row($(this).closest('tr')).data();
        console.log(rowData);
        let modal = new Modal($('#delete-user-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        });

        $('#confirm-delete-user').off('click').on('click', function () {
            const url = "{{ route('admin.destroy-user', ':user') }}";
            $.ajax({
                url: url.replace(':user', rowData.userId),
                type: 'DELETE',
                data: {
                    id: rowData.userId,
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    usersTable.ajax.reload();
                    modal.hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });

    usersTable.on('click', '.edit-user-button', function () {
        let rowData = usersTable.row($(this).closest('tr')).data();
        console.log(rowData);
        let modal = new Modal($('#edit-user-modal')[0]);
        modal.show();
        $('.close-modal').on('click', function () {
            modal.hide();
        });
        $('#user-name-edit').val(rowData.userName);
        $('#user-email-edit').val(rowData.userEmail);
        $('#user-role-edit').val(rowData.userRole);

        $('#confirm-update-user').off('click').on('click', function () {
            const url = "{{ route('admin.update-user', ':user') }}";
            $.ajax({
                url: url.replace(':user', rowData.userId),
                type: 'PUT',
                data: {
                    name: $('#user-name-edit').val(),
                    email: $('#user-email-edit').val(),
                    role: $('#user-role-edit').val(),
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function () {
                    usersTable.ajax.reload();
                    modal.hide();
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });


    });

</script>
