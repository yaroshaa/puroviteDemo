<x-app-layout>
    <div class="lg:py-8 md:py-8 sm:py-5 lt:py-5 lg:mt-16 xl:mt-16 md:mt-8 sm:mt-0 lt:mt-0 p-2">
        <div class="max-w-7xl mx-auto xl:mb-40 lg:mb-40 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="w-4/5 text-white">
                <h2 class="uppercase xl:text-6xl lg:text-6xl md:text-4xl sm:text-2xl lt:text-2xl">
                    {{ __('Contact') }}
                </h2>
                <div class="xl:text-white lg:text-white md:text-gray-600 sm:text-gray-600 lt:text-gray-600 lg:my-16 sm:my-2 xl:w-3/4 lg:w-3/4 md:w-full sm:w-full lt:w-full sm:text-xs md:text-2xl">
                    {{ __('Send us a message') }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-2 xl:mb-10 lg:mb-10 md:mb-8 sm:mb-3 lt:mb-3">
            <div class="flex justify-start pt-14 ">
                <div class="xl:w-2/4 lg:w-2/4 md:w-2/4 sm:w-full lt:w-full p-4">
                    <form method="POST" action="{{ route('contactsSend') }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="message" :value="__('Message')" />
                            <x-text-area id="message" class="block mt-1 w-full" type="text" name="message" :value="old('message')" required></x-text-area>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>
                        @php
                            $attributes = [
                            ];
                        @endphp
                        {!! app('captcha')->display($attributes) !!}
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Send') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
