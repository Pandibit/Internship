<div class="relative inline-block text-left">
    <div>
        <button type="button"
                class="inline-flex menu-button items-center justify-between w-full rounded-full border border-gray-300 shadow-sm px-1 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-0 "
                aria-expanded="true" aria-haspopup="true">
            <div class="rounded-full bg-gray-200 p-1 h-6 w-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                    <path fill-rule="evenodd"
                          d="M256 256a112 112 0 1 0-112-112a112 112 0 0 0 112 112m0 32c-69.42 0-208 42.88-208 128v64h416v-64c0-85.12-138.58-128-208-128"/>
                </svg>
            </div>

            <svg class=" active-button mr-2 mx-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" class="lucide-icon lucide lucide-chevron-down h-5 w-5   ">
                <path d="m6 9 6 6 6-6"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="lucide inactive-button hidden mr-2 mx-2 lucide-chevron-up  ">
                <path d="m18 15-6-6-6 6"/>
            </svg>


        </button>
    </div>

    <!--
      Dropdown menu, show/hide based on menu state.

      Entering: "transition ease-out duration-100"
        From: "transform opacity-0 scale-95"
        To: "transform opacity-100 scale-100"
      Leaving: "transition ease-in duration-75"
        From: "transform opacity-100 scale-100"
        To: "transform opacity-0 scale-95"
    -->
    <div
        class="menu hidden origin-top-right absolute right-0 mt-2 w-56  rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1 " role="none">
            @guest
                <a href="{{ route('register') }}"
                   class="text-gray-700 group flex rounded-md items-center px-2 py-2 text-sm hover:bg-gray-200"
                   role="menuitem" tabindex="-1" id="menu-item-0">
                    <x-icons.register class="mr-2"/>
                    Sign up
                </a>
                <a href="{{ route('login') }}"
                   class="text-gray-700 group flex rounded-md items-center px-2 py-2 text-sm hover:bg-gray-200"
                   role="menuitem" tabindex="-1" id="menu-item-0">
                    <x-icons.login class="mr-2"/>
                    Log in
                </a>
            @endguest
            @auth
                <form method="POST" action="/logout" class="mb-0">
                    @csrf
                    @method('DELETE')
                    <button
                        class="w-full text-gray-700 group flex rounded-md items-center px-2 py-2 text-sm hover:bg-gray-200"
                        role="menuitem" id="menu-item-0">
                        <x-icons.login class="mr-2"/>
                        Log out

                    </button>
                </form>
                @hasrole('admin')
                <a href="{{ route('admin.index') }}"
                   class="text-gray-700 group flex rounded-md items-center px-2 py-2 text-sm hover:bg-gray-200"
                   role="menuitem" tabindex="-1" id="menu-item-0">
                    <x-icons.admin class="mr-2"/>
                    Admin Panel
                </a>
                @endhasrole
                @can('delete product', 'web')
                    <a href="{{ route('admin.products') }}"
                       class="text-gray-700 group flex rounded-md items-center px-2 py-2 text-sm hover:bg-gray-200"
                       role="menuitem" tabindex="-1" id="menu-item-0">
                        <x-icons.admin class="mr-2"/>
                        Products
                    </a>
                @endcan

            @endauth

        </div>

    </div>
</div>
<script>
    $(document).ready(function () {

        function toggleMenu() {
            const $menuToggleButton = $('.menu-button');
            const $mobileMenu = $('.menu');
            const $inactiveButton = $('.inactive-button')
            const $activeButton = $('.active-button');

            function toggleMenu() {
                event.stopPropagation();
                $mobileMenu.toggleClass('hidden');
                $inactiveButton.toggleClass('hidden');
                $activeButton.toggleClass('hidden');
            }

            $menuToggleButton.on('click', toggleMenu);

            $(document).on('click', function (event) {
                if (!$mobileMenu.is(event.target) && !$mobileMenu.has(event.target).length) {
                    if (!$mobileMenu.hasClass('hidden')) {
                        toggleMenu();
                    }
                }
            });
        }

        toggleMenu();


    });
</script>


