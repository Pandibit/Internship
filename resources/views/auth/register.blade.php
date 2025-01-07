<x-auth.register-app>

    <x-slot:welcomingSlot>
        <x-auth.welcomeDivAuth/>
    </x-slot:welcomingSlot>

    <x-forms.form action="{{ route('register.store') }}">


        <div class="flex flex-col w-full">
            <x-forms.input type="text" placeholderName="Name" name="name" :value="old('name')"/>
            <x-forms.error type="name"/>
        </div>


        <div class="flex flex-col w-full">
            <x-forms.email-input type="email" name="email" placeholderName="Email" :value="old('email')"/>
            <x-forms.error type="email"/>
        </div>

        <div class="flex flex-col w-full ">
            <x-forms.input type="password" name="password" placeholderName="Password"/>
            <x-forms.error type="password"/>
        </div>

        <div class="flex flex-col w-full">
            <x-forms.input type="password" name="password_confirmation" placeholderName="Password Confirmation"/>

        </div>

        <div class="flex justify-between items-center w-full">

            <button type="submit"
                    class="bg-space-cadet w-full flex justify-center items-center space-x-2 text-white transition duration-300 md:w-64 ease-in hover:bg-white hover:text-space-cadet border focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-md text-sm  py-3 mb-2">

                <x-icons.register/>
                <p>Complete Sign up </p>
            </button>

        </div>


    </x-forms.form>

    <x-slot:signalSlot>
    </x-slot:signalSlot>


    <x-slot:imageDivSlot>
        <x-auth.imageDivAuth imageSource="{{ asset('images/Register.jpg') }}"/>
    </x-slot:imageDivSlot>

</x-auth.register-app>
