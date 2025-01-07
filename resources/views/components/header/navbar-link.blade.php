<button
    class="flex text-nowrap text-center  rounded-3xl text-gray-800 transition duration-300  ease-in  hover:bg-gray-100  focus:outline-none focus:ring-0  font-medium  text-sm px-4 py-3 ">
    <a {{ $attributes }}>
        {{ $slot }}

    </a>
    @isset($indicatorCartSlot)
        {{ $indicatorCartSlot }}
    @endisset

</button>
