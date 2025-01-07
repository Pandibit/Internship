<div class="flex rounded-md">
    <span
        class="inline-flex items-center px-3 text-sm text-gray-900  border  border-gray-300  rounded-s-lg border-r-0 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.15em" height="1em" viewBox="0 0 16 14">
            <path fill="currentColor"
                d="M14.5 13h-13C.67 13 0 12.33 0 11.5v-9C0 1.67.67 1 1.5 1h13c.83 0 1.5.67 1.5 1.5v9c0 .83-.67 1.5-1.5 1.5M1.5 2c-.28 0-.5.22-.5.5v9c0 .28.22.5.5.5h13c.28 0 .5-.22.5-.5v-9c0-.28-.22-.5-.5-.5z" />
            <path fill="currentColor"
                d="M8 8.96c-.7 0-1.34-.28-1.82-.79L.93 2.59c-.19-.2-.18-.52.02-.71s.52-.18.71.02l5.25 5.58c.57.61 1.61.61 2.18 0l5.25-5.57c.19-.2.51-.21.71-.02s.21.51.02.71L9.82 8.18c-.48.51-1.12.79-1.82.79Z" />
        </svg>
    </span>

    <div class="relative z-0 w-full  group bg-gray-100">
        <input {{ $attributes }} id={{ $attributes->get('name') }}
            class="px-3 peer shadow-sm bg-gray-100  border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:outline-none focus:ring-0  block w-full p-2.5 "
            placeholder="" />
        <label for="{{ $attributes->get('name') }}"
            class=" mx-3 px-1  peer-focus:font-medium absolute text-sm text-gray-500  bg-gray-100 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75  top-3  origin-[0] peer-focus:z-20 peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">{{ $placeholderName }}</label>
    </div>
</div>
