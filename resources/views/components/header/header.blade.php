<header class="fixed top-0  mx-4 px-2 my-4 w-[calc(100%-2rem)] text-atomic-tangarine bg-transparent text-white z-50">

    <div class=" flex items-center gap-3 justify-between ">


        <x-header.logo-container/>

        <div class="hidden lg:block w-full mx-4">


            {{--            <div class="relative">--}}
            {{--                <div class="absolute inset-y-0 end-0 flex items-center pr-3 pointer-events-none">--}}
            {{--                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"--}}
            {{--                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">--}}
            {{--                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
            {{--                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />--}}
            {{--                    </svg>--}}
            {{--                </div>--}}
            {{--                <input type="text" id="default-search"--}}
            {{--                    class="block w-full px-4 py-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"--}}
            {{--                    placeholder="Search ..." />--}}

            {{--            </div>--}}
            <label for="default-search"
                   class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>

        </div>

        <div class="flex items-center justify-center gap-2">


            <x-header.navbar/>

            <x-header.controller/>

        </div>

</header>
