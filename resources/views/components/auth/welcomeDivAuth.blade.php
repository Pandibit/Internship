@props([
    'welcomePhrase' => 'Join us today!',
    'signalPhrase' => 'Create your account to join our community. Already a member?',
    'link' => route('login'),
    'to' => 'Login to your account',
])


<div class="mb-4 mt-8 flex flex-col  space-y-2">

    <p class="text-4xl font-normal">{{ $welcomePhrase }}</p>

    <div>
        <p class="opacity-65 text-normal flex flex-wrap items-center">
            <span>{{ $signalPhrase }}</span>
            <a href="{{ $link }}" class="underline py-1 pl-1"> {{ $to }}</a>
        </p>

    </div>
</div>
