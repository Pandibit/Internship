<div class="relative z-0 w-full  group bg-gray-100">
    <input {{ $attributes }} id={{ $attributes->get('name') }}
        class="px-3 peer shadow-sm bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg
           focus:outline-none focus:ring-0 block w-full p-2.5"
    placeholder="" />
    <label for="{{ $attributes->get('name') }}"
           class=" mx-3 px-1  peer-focus:font-medium absolute text-sm text-gray-500  bg-gray-100 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75  top-3  origin-[0] peer-focus:z-20 peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">{{ $placeholderName }}</label>
</div>
