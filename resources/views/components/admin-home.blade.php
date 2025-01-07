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
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/api/sum().js"></script>


    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="font-body">

<div class="flex">
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
    <div class="px-4 sm:ml-64 flex flex-col flex-grow">
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
        {{ $slot }}
    </div>
</div>

</body>
</html>



