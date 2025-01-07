@php
    if (!session()->has('shoppingCart')) {
        session()->put('shoppingCart', []);
    }
@endphp
<nav class=" flex items-center gap-3">
    <x-header.navbar-link href="{{ route('about') }}">Explore us</x-header.navbar-link>

    <p class="text-gray-400">|</p>
    <div class="flex gap-2">
        <x-header.navbar-link href="{{ route('shopping-cart') }}">
            <x-icons.shoping-cart/>
            <x-slot:indicatorCartSlot>
                @guest()
                    @if (count(session(('shoppingCart'))) > 0)
                        <span class="badge badge-sm indicator-item">
                            {{ count(session('shoppingCart')) }}
                        </span>
                    @endif

                @endguest
                {{--                @auth()--}}
                {{--                    @if(count(json_decode(\Illuminate\Support\Facades\Cookie::get('shoppingCart_' . \Illuminate\Support\Facades\Auth::id()))) > 0)--}}
                {{--                        <span class="badge badge-sm indicator-item">--}}
                {{--                            {{ count(json_decode(\Illuminate\Support\Facades\Cookie::get('shoppingCart_' . \Illuminate\Support\Facades\Auth::id()))) }}--}}
                {{--                        </span>--}}
                {{--                    @endif--}}
                {{--                @endauth--}}

            </x-slot:indicatorCartSlot>
        </x-header.navbar-link>
        <x-header.navbar-link href="{{ route('contact') }}">
            <x-icons.contact/>
        </x-header.navbar-link>
    </div>

</nav>
