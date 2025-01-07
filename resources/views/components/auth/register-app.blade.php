<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="font-body">
    <div class="h-screen bg-gray-50">
        <div class="flex items-center h-full py-4 justify-between space-x-2 px-8">

            <div class="flex bg-gray-100 flex-col flex-grow h-full justify-between px-5 py-4 border rounded-lg ">

                <div class="flex items-center justify-between">
                    <x-header.logo-container />

                    <button
                        class="bg-white transition duration-300 ease-in hover:bg-milk  flex items-center space-x-2  border border-gray-300 
                    focus:outline-none  focus:ring-4 focus:ring-gray-100 
                    font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2
                    ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1.25em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="m6.921 9.5l3.439 3.439q.165.165.162.353q-.003.189-.162.354q-.166.165-.364.159t-.344-.153L5.566 9.566q-.131-.132-.184-.268T5.329 9t.053-.298t.184-.267L9.64 4.359q.165-.165.356-.165q.192 0 .357.165q.165.166.156.364t-.156.344L6.92 8.5h9.464q.67 0 1.143.472q.472.472.472 1.144V18.5q0 .214-.143.357T17.5 19t-.357-.143T17 18.5v-8.384q0-.27-.173-.443t-.442-.173z" />
                        </svg>
                        <a href="{{ route('home') }}">Return Home</a>
                    </button>
                </div>

                <section class="h-full w-full mt-10 mx-auto md:max-w-lg md:mt-20">


                    {{ $welcomingSlot }}

                    {{ $slot }}

                    {{ $signalSlot }}



                </section>


                <section class="">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>


                    </div>
                    <div class="w-full flex items-center justify-center">
                        <p class="pt-2 text-xs">@ Media Local Web 2024 Internship</p>
                    </div>
                </section>


            </div>


            {{ $imageDivSlot }}
        </div>
    </div>
</body>

</html>
