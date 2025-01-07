<x-auth.register-app>


    <x-slot:welcomingSlot>
        <x-auth.welcomeDivAuth welcomePhrase="Welcome back!" signalPhrase="Sign in to Media or" to="create an account"
                               link="{{ route('register') }}"/>

    </x-slot:welcomingSlot>

    <x-forms.form action="{{ route('login.store') }}">

        <div class="flex flex-col w-full">
            <x-forms.email-input type="email" name="email" placeholderName="Email" :value="old('email')"/>
            <x-forms.error type="email"/>
        </div>
        <div class="flex flex-col w-full">

            <x-forms.input type="password" placeholderName="Password" name="password"/>
            <x-forms.error type="password"/>
            <x-forms.error type="general"/>
        </div>

        <div class="flex justify-between items-center w-full">
            <button type="submit"
                    class="bg-space-cadet flex justify-center items-center space-x-2 text-white transition duration-300 w-48 ease-in hover:bg-white hover:text-space-cadet border focus:outline-none focus:ring-4 focus:ring-gray-100 font-medium rounded-md text-sm px-5 py-2.5 mb-2">
                <x-icons.login/>
                <p>Log in</p>
            </button>

        </div>
    </x-forms.form>

    <x-slot:signalSlot>
        <x-auth.signalDivAuth/>
    </x-slot:signalSlot>

    <x-slot:imageDivSlot>
        <x-auth.imageDivAuth imageSource="{{ asset('images/Login.jpg') }}">
        </x-auth.imageDivAuth>
    </x-slot:imageDivSlot>

</x-auth.register-app>
