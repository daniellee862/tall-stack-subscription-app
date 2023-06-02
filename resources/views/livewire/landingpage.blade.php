<div>
    <div
        class="flex flex-col bg-gradient-to-r from-blue-400 to-indigo-600 w-full h-screen"
        x-data="{
        showSubscribe: @entangle('showSubscribe'),
        showSuccess: @entangle('showSuccess'),
        }"
    >
        <nav class="flex pt-5 justify-between container mx-auto text-indigo-200">
            <a class="text-2xl font-medium" href="/">
                <x-application-logo class="w-16 h-16"></x-application-logo>
            </a>
            <div class="flex justify-end text-white">
                @auth()
                    <a href="{{route('dashboard')}}">Dashboard</a>
                @else
                    <a href="{{route('login')}}">Login</a>
                @endauth
            </div>
        </nav>

        <div class="flex container mx-auto items-center h-full">
            <div class="flex flex-col w-1/3 items-start">
                <h1 class="text-white font-bold text-5xl leading-tight mb-4">Simple generic landing page to
                    subscribe</h1>
                <p class="text-indigo-200 text-xl mb-10">We are just checking the<span
                        class="font-bold underline"> TALL </span>stack. Would you mind subscribing?</p>
                <x-button
                    x-on:click="showSubscribe = true"
                    class="py-3 px-8 bg-red-500 hover:bg-red-600">Subscribe
                </x-button>
            </div>
        </div>

        <x-modal class="bg-pink-500" trigger="showSubscribe">
            <p class="text-white text-5xl font-bold text-center">
                Lets do it!
            </p>
            <form
                class="flex flex-col items-center p-16"
                wire:submit.prevent="subscribe"
            >
                <x-input
                    class=""
                    type="email"
                    name="email"
                    placeholder="Email address"
                    wire:model.defer="email"
                >
                </x-input>
                <span class="text-gray-100 text-xs mt-2">
                    {{
                        $errors->has('email')
                        ? $errors->first('email')
                        : 'We will send you a confirmation email.'
                    }}
            </span>
                <x-button
                    class="px-5 py-3 mt-5 w-80 bg-indigo-500 justify-center"
                >
                    <span class="animate-spin" wire:loading wire:target="subscribe" >&#9696</span>
                    <span wire:loading.remove wire:target="subscribe">Get In!</span>

                </x-button>

            </form>
        </x-modal>
        {{-- --}}

        <x-modal class="bg-green-500" trigger="showSuccess">
            <p class="animate-pulse text-white text-9xl font-bold text-center">
                &check;
            </p>
            <p class="text-white text-5xl font-bold text-center mt-12">
                Great.
            </p>
            @if(request()->has('verified') && request()->verified == 1 )
                <p class="text-white text-3xl text-center mt-2">
                    Subscription confirmed.
                </p>
            @else
            <p class="text-white text-3xl text-center mt-2">
                You have successfully subscribed.
            </p>
            @endif
        </x-modal>

    </div>
</div>
